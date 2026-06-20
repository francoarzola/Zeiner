<?php
declare(strict_types=1);

const RECEIVING_EMAIL = 'contacto@zeiner.cl';
const FROM_EMAIL = 'contacto@zeiner.cl';
const FROM_NAME = 'Sitio web ZEINER Electronica';
const SUBJECT = 'Nueva consulta desde sitio web ZEINER Electrónica';
const CUSTOMER_REPLY_SUBJECT = 'Hemos recibido su contacto | ZEINER Electrónica';
const MIN_FORM_SECONDS = 1;
const RATE_LIMIT_MAX = 5;
const RATE_LIMIT_WINDOW = 3600;

header('Content-Type: text/plain; charset=UTF-8');

$secure_session = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
session_set_cookie_params([
  'lifetime' => 0,
  'path' => '/',
  'secure' => $secure_session,
  'httponly' => true,
  'samesite' => 'Lax',
]);

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

$allowed_services = [
  'Televisor',
  'Iluminación LED',
  'Lavadora',
  'Equipo de música',
  'Consola',
  'Electrónica general',
  'Diagnóstico a domicilio',
];

function fail(string $event = 'validation_failed', int $status = 400): void
{
  log_event($event);
  http_response_code($status);
  echo 'No fue posible enviar el mensaje. Inténtalo nuevamente o contáctanos por WhatsApp.';
  exit;
}

function ok(string $event = 'ok'): void
{
  log_event($event);
  echo 'OK';
  exit;
}

function text_field(string $key, int $min, int $max, bool $required = true): string
{
  $value = isset($_POST[$key]) && is_string($_POST[$key]) ? trim($_POST[$key]) : '';
  $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/u', '', $value) ?? '';
  $value = preg_replace('/[ \t]+/', ' ', $value) ?? '';

  $length = text_length($value);
  if ($required && $length < $min) {
    fail('validation_failed');
  }

  if ($length > $max) {
    fail('validation_failed');
  }

  return $value;
}

function text_length(string $value): int
{
  return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
}

function text_cut(string $value, int $max): string
{
  return function_exists('mb_substr') ? mb_substr($value, 0, $max, 'UTF-8') : substr($value, 0, $max);
}

function reject_header_injection(string $value): void
{
  if (preg_match('/[\r\n]/', $value)) {
    fail('validation_failed');
  }
}

function client_ip(): string
{
  $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
  return preg_replace('/[^a-fA-F0-9:\.]/', '', $ip) ?: 'unknown';
}

function rate_limit_check(string $ip): void
{
  $hash = hash('sha256', $ip);
  $file = storage_path('rate-limit' . DIRECTORY_SEPARATOR . $hash . '.json');
  $now = time();
  $events = [];

  $handle = @fopen($file, 'c+');
  if ($handle === false) {
    return;
  }

  try {
    if (flock($handle, LOCK_EX)) {
      $contents = stream_get_contents($handle);
      $decoded = json_decode($contents ?: '[]', true);
      if (is_array($decoded)) {
        $events = array_filter($decoded, static function ($timestamp) use ($now): bool {
          return is_int($timestamp) && $timestamp > ($now - RATE_LIMIT_WINDOW);
        });
      }

      if (count($events) >= RATE_LIMIT_MAX) {
        flock($handle, LOCK_UN);
        fclose($handle);
        fail('rate_limit', 429);
      }

      $events[] = $now;
      ftruncate($handle, 0);
      rewind($handle);
      fwrite($handle, json_encode(array_values($events)));
      fflush($handle);
      flock($handle, LOCK_UN);
    }
  } finally {
    if (is_resource($handle)) {
      fclose($handle);
    }
  }
}

function storage_path(string $relative): string
{
  $base = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'storage';
  $path = $base . DIRECTORY_SEPARATOR . $relative;
  $dir = dirname($path);

  if (!is_dir($dir)) {
    @mkdir($dir, 0755, true);
  }

  return $path;
}

function log_event(string $event, array $context = []): void
{
  $file = storage_path('logs' . DIRECTORY_SEPARATOR . 'contact.log');
  $payload = array_merge([
    'event' => $event,
    'time' => date('c'),
    'ip_hash' => hash('sha256', client_ip()),
    'method' => $_SERVER['REQUEST_METHOD'] ?? '',
    'user_agent_hash' => hash('sha256', text_field_from_server('HTTP_USER_AGENT', 0, 180)),
  ], $context);

  @file_put_contents($file, json_encode($payload, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND | LOCK_EX);
}

function safe_html(string $value): string
{
  return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function safe_header_text(string $value): string
{
  reject_header_injection($value);
  return trim($value);
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
  fail('invalid_method', 405);
}

log_event('submission_attempt');

if (!empty($_POST['website'] ?? '')) {
  ok('honeypot_triggered');
}

$posted_token = isset($_POST['csrf_token']) && is_string($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
$session_token = isset($_SESSION['csrf_token']) && is_string($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '';
if ($posted_token === '' || $session_token === '' || !hash_equals($session_token, $posted_token)) {
  fail('csrf_invalid');
}

$started_at = isset($_POST['form_started_at']) && is_string($_POST['form_started_at']) ? (int) $_POST['form_started_at'] : 0;
if ($started_at <= 0 || (time() - $started_at) < MIN_FORM_SECONDS || (time() - $started_at) > 86400) {
  fail('validation_failed');
}

rate_limit_check(client_ip());

$name = text_field('name', 2, 80);
$phone = text_field('phone', 7, 30);
$email = text_field('email', 0, 120, false);
$service = text_field('subject', 2, 60);
$message = text_field('message', 10, 1500);

if (!preg_match('/^\+?[0-9\s\-\(\)]{7,30}$/', $phone)) {
  fail('validation_failed');
}

if (!in_array($service, $allowed_services, true)) {
  fail('validation_failed');
}

$privacy_consent = isset($_POST['privacy_consent']) && $_POST['privacy_consent'] === '1';
if (!$privacy_consent) {
  fail('validation_failed');
}

$validated_email = '';
if ($email !== '') {
  reject_header_injection($email);
  $validated_email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : '';
  if ($validated_email === '') {
    fail('validation_failed');
  }
}

safe_header_text($name);
safe_header_text($phone);
safe_header_text($service);

$ip = client_ip();
$user_agent = text_field_from_server('HTTP_USER_AGENT', 0, 180);
$date = date('Y-m-d H:i:s');

$body = '<p>Datos enviados desde el formulario web de ZEINER Electrónica.</p>';
$body .= '<table cellpadding="6" cellspacing="0" border="0">';
$body .= '<tr><td><strong>Nombre</strong></td><td>' . safe_html($name) . '</td></tr>';
$body .= '<tr><td><strong>Email</strong></td><td>' . safe_html($email !== '' ? $email : 'No informado') . '</td></tr>';
$body .= '<tr><td><strong>Teléfono</strong></td><td>' . safe_html($phone) . '</td></tr>';
$body .= '<tr><td><strong>Tipo de equipo/servicio</strong></td><td>' . safe_html($service) . '</td></tr>';
$body .= '<tr><td><strong>Mensaje</strong></td><td>' . nl2br(safe_html($message)) . '</td></tr>';
$body .= '<tr><td><strong>IP</strong></td><td>' . safe_html($ip) . '</td></tr>';
$body .= '<tr><td><strong>Fecha/hora servidor</strong></td><td>' . safe_html($date) . '</td></tr>';
$body .= '<tr><td><strong>User agent</strong></td><td>' . safe_html($user_agent) . '</td></tr>';
$body .= '</table>';

$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/html; charset=UTF-8';
$headers[] = 'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>';
$headers[] = 'Return-Path: <' . FROM_EMAIL . '>';
if ($validated_email !== '') {
  $headers[] = 'Reply-To: <' . $validated_email . '>';
}
$headers[] = 'X-Mailer: PHP/' . phpversion();

$encoded_subject = '=?UTF-8?B?' . base64_encode(SUBJECT) . '?=';
$sent = @mail(RECEIVING_EMAIL, $encoded_subject, $body, implode("\r\n", $headers), '-f ' . FROM_EMAIL);
if (!$sent) {
  fail('send_failed', 500);
}

if ($validated_email !== '') {
  $customer_body = '<!DOCTYPE html><html lang="es"><body style="margin:0; padding:0; background:#f5f5f5; font-family:Arial, Helvetica, sans-serif; color:#1B1F23;">';
  $customer_body .= '<div style="max-width:620px; margin:0 auto; padding:28px 16px;">';
  $customer_body .= '<div style="background:#ffffff; border:1px solid #e2e5e3; border-radius:10px; padding:28px; box-shadow:0 8px 24px rgba(8,10,12,0.06);">';
  $customer_body .= '<div style="text-align:center; margin-bottom:24px;"><img src="https://zeiner.cl/assets/img/uploads/logowebzeiner2.png" alt="ZEINER Electrónica" width="220" style="max-width:220px; height:auto;"></div>';
  $customer_body .= '<div style="border-left:4px solid #0F6B35; padding-left:16px; margin-bottom:20px;">';
  $customer_body .= '<h1 style="margin:0 0 10px; font-size:22px; line-height:1.3; color:#0F6B35;">Mensaje recibido correctamente</h1>';
  $customer_body .= '<p style="margin:0; font-size:15px; line-height:1.65;">Muchas gracias por su contacto.</p>';
  $customer_body .= '</div>';
  $customer_body .= '<p style="font-size:15px; line-height:1.7; margin:0 0 16px;">Hemos recibido correctamente su mensaje a través del sitio web de ZEINER Electrónica.</p>';
  $customer_body .= '<p style="font-size:15px; line-height:1.7; margin:0 0 20px;">Revisaremos la información enviada y nos pondremos en contacto a la brevedad, ya sea por teléfono, WhatsApp o correo electrónico, según los datos que nos haya proporcionado.</p>';
  $customer_body .= '<p style="font-size:15px; line-height:1.7; margin:0 0 20px;"><strong>ZEINER Electrónica</strong><br>Más de 35 años en electrónica<br>La Reina, Santiago<br>WhatsApp: <a href="https://wa.me/56984469093" style="color:#0F6B35; font-weight:700; text-decoration:none;">+56 9 8446 9093</a></p>';
  $customer_body .= '<p style="font-size:13px; line-height:1.6; margin:0; color:#5f666b;">Este correo confirma la recepción de su mensaje. No es necesario que vuelva a enviar el formulario.</p>';
  $customer_body .= '</div></div></body></html>';

  $customer_headers = [];
  $customer_headers[] = 'MIME-Version: 1.0';
  $customer_headers[] = 'Content-Type: text/html; charset=UTF-8';
  $customer_headers[] = 'From: ZEINER Electrónica <' . FROM_EMAIL . '>';
  $customer_headers[] = 'Reply-To: <' . FROM_EMAIL . '>';
  $customer_headers[] = 'Return-Path: <' . FROM_EMAIL . '>';
  $customer_headers[] = 'X-Mailer: PHP/' . phpversion();

  $customer_encoded_subject = '=?UTF-8?B?' . base64_encode(CUSTOMER_REPLY_SUBJECT) . '?=';
  $customer_sent = @mail($validated_email, $customer_encoded_subject, $customer_body, implode("\r\n", $customer_headers), '-f ' . FROM_EMAIL);

  if ($customer_sent) {
    log_event('customer_autoreply_sent');
  } else {
    log_event('customer_autoreply_failed');
  }
}

ok('send_success');

function text_field_from_server(string $key, int $min, int $max): string
{
  $value = isset($_SERVER[$key]) && is_string($_SERVER[$key]) ? trim($_SERVER[$key]) : '';
  $value = preg_replace('/[\x00-\x1F\x7F]+/u', '', $value) ?? '';
  if (text_length($value) < $min) {
    return '';
  }

  if (text_length($value) > $max) {
    return text_cut($value, $max);
  }

  return $value;
}
