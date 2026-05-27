# Fase 9 - Hardening final del formulario

Fecha: 2026-05-27  
Proyecto: ZEINER Electronica  
Alcance: microfase final de seguridad para formulario PHP/cPanel.

## 1. Resumen de cambios

- Se agrego token CSRF con sesion PHP.
- Se agrego endpoint `forms/csrf-token.php` para entregar el token al formulario.
- Se agrego campo oculto `csrf_token` en `index.html`.
- Se carga el token mediante `fetch('forms/csrf-token.php')`.
- Se agrego checkbox obligatorio de consentimiento de privacidad.
- Se valida el consentimiento en backend.
- Se agrego logging operacional en JSON Lines.
- Se movio el rate limit desde temp del sistema a `storage/rate-limit/`.
- Se agrego proteccion web para `storage/`.
- Se agrego `.gitignore` para no versionar logs ni archivos de rate limit.

No se agrego CAPTCHA, Turnstile, base de datos ni dependencias externas.

## 2. Archivos modificados o creados

- `forms/contact.php`
- `forms/csrf-token.php`
- `index.html`
- `storage/.htaccess`
- `.gitignore`
- `docs/fase-9-hardening-final-formulario-zeiner.md`

No se modificaron:

- `terms.html`
- `privacy.html`
- `robots.txt`
- `sitemap.xml`
- Schema JSON-LD
- assets
- diseno visual general
- textos comerciales de fondo

## 3. Como funciona CSRF

- `forms/csrf-token.php` inicia sesion PHP con cookie configurada como:
  - `httponly`;
  - `samesite=Lax`;
  - `secure` cuando HTTPS esta activo.
- Si la sesion no tiene token, genera uno con `random_bytes(32)` y lo codifica con `bin2hex`.
- `index.html` solicita el token con `fetch('forms/csrf-token.php')`.
- El token se guarda en el campo oculto `csrf_token`.
- `forms/contact.php` valida:
  - que exista token enviado;
  - que exista token en sesion;
  - que ambos coincidan con `hash_equals`.
- Si el token falta o no valida, se responde con error generico.

## 4. Como funciona el consentimiento

Se agrego al formulario un checkbox obligatorio:

`Acepto que ZEINER Electronica use mis datos para responder esta solicitud, conforme a la Politica de privacidad.`

- El checkbox enlaza a `privacy.html`.
- El campo se envia como `privacy_consent=1`.
- `forms/contact.php` rechaza el envio si el consentimiento no viene aceptado.
- No se modifico el contenido de `privacy.html`.

## 5. Como funciona el logging

El formulario registra eventos operacionales en:

- `storage/logs/contact.log`

Formato:

- JSON Lines, un evento por linea.

Datos registrados:

- evento;
- fecha/hora;
- hash de IP;
- metodo HTTP;
- hash de user agent;
- contexto tecnico minimo cuando corresponde.

No se registra IP cruda en logs.

Eventos considerados:

- `submission_attempt`
- `invalid_method`
- `csrf_invalid`
- `honeypot_triggered`
- `rate_limit`
- `validation_failed`
- `send_success`
- `send_failed`

## 6. Proteccion de `storage/`

Se creo:

- `storage/.htaccess`

Su funcion es bloquear acceso web al almacenamiento operacional.

Tambien se agrego `.gitignore` con:

- `storage/logs/*.log`
- `storage/rate-limit/*.json`

Los archivos operacionales se crean en runtime por PHP y no deben versionarse.

## 7. Pruebas en cPanel

Probar en hosting real:

1. Abrir home y confirmar que no hay errores JS.
2. Confirmar que `forms/csrf-token.php` responde JSON con `token`.
3. Enviar formulario valido y confirmar correo recibido.
4. Enviar formulario sin token CSRF y confirmar error generico.
5. Enviar formulario con token alterado y confirmar error generico.
6. Enviar sin aceptar privacidad y confirmar error generico.
7. Activar honeypot de forma controlada y confirmar que no se envia correo.
8. Probar rate limit con envios repetidos.
9. Confirmar que `storage/logs/contact.log` se genera en servidor.
10. Confirmar que `https://zeiner.cl/storage/` no es accesible.
11. Revisar logs de error de cPanel.
12. Revisar spam/correo recibido.

## 8. Riesgos pendientes

- El envio sigue dependiendo de `mail()` del hosting.
- Si cPanel bloquea sesiones o escritura en `storage/`, el formulario debe ajustarse.
- Si `no-reply@zeiner.cl` no existe o no esta autorizado, puede afectar entregabilidad.
- No hay CAPTCHA ni Turnstile; se mantiene como pendiente si aumenta el spam.
- No hay rotacion automatica de logs; conviene revisar tamano de `storage/logs/contact.log` periodicamente.

## 9. Recomendacion de publicacion

- No subir `/docs/` a `public_html`.
- Si se sube el proyecto completo, confirmar que `robots.txt` bloquea `/docs/`, pero la recomendacion operativa sigue siendo no publicar documentacion interna.
- Mantener `storage/.htaccess`.
- Mantener `.gitignore` en repositorio.
- Confirmar permisos:
  - carpetas `0755`;
  - archivos `0644`;
  - PHP con permiso de escritura en `storage/logs/` y `storage/rate-limit/`.

