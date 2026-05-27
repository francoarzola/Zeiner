# Fase 5 - Seguridad cPanel, formulario y .htaccess

Fecha: 2026-05-27  
Proyecto: ZEINER Electronica  
Alcance: hardening del formulario PHP, campos antispam en `index.html`, configuracion `.htaccess` conservadora y recomendaciones de despliegue seguro.

> Esta fase se limita a seguridad tecnica para un sitio estatico/PHP simple en Apache/cPanel. No se agregaron analytics, Schema JSON-LD, `robots.txt` ni `sitemap.xml`.

## 1. Resumen de cambios realizados

- Se reemplazo el handler heredado de BootstrapMade en `forms/contact.php` por un handler PHP autonomo y validado.
- Se agrego honeypot y timestamp al formulario de `index.html`.
- Se creo `.htaccess` con reglas conservadoras para cPanel/Apache.
- Se mantuvo el correo receptor del formulario: `contacto@zeiner.cl`.
- Se dejo el asunto del correo como: `Nueva consulta desde sitio web ZEINER Electrónica`.
- Se documento que el remitente tecnico usado por el formulario es `no-reply@zeiner.cl`, pendiente de validar con el hosting/correo.

## 2. Archivos modificados

- `forms/contact.php`
- `index.html`
- `.htaccess`
- `docs/fase-5-seguridad-cpanel-formulario.md`

No se modificaron en esta fase:

- `terms.html`
- `privacy.html`
- `robots.txt`
- `sitemap.xml`
- analytics
- Schema JSON-LD
- diseno visual general

## 3. Cambios en `forms/contact.php`

Se implemento:

- Validacion obligatoria de metodo `POST`.
- Validacion backend de campos requeridos:
  - `name`
  - `phone`
  - `subject`
  - `message`
- Validacion opcional de `email` con `FILTER_VALIDATE_EMAIL`.
- Validacion de telefono con patron razonable:
  - numeros;
  - espacios;
  - guiones;
  - parentesis;
  - signo `+`.
- Limites de longitud:
  - nombre: 2 a 80 caracteres;
  - telefono: 7 a 30 caracteres;
  - correo: hasta 120 caracteres;
  - servicio: hasta 60 caracteres;
  - mensaje: 10 a 1500 caracteres;
  - user agent recortado a 180 caracteres.
- Allowlist de servicios:
  - `Televisor`
  - `Iluminacion LED`
  - `Lavadora`
  - `Refrigerador`
  - `Equipo de musica`
  - `Consola`
  - `Electronica general`
  - `Diagnostico a domicilio`
- Sanitizacion basica:
  - `trim`;
  - remocion de caracteres de control;
  - normalizacion de espacios;
  - `htmlspecialchars` para el cuerpo HTML del correo.
- Proteccion contra inyeccion de cabeceras:
  - rechazo de saltos de linea en valores usados en cabeceras;
  - no se usa el correo del visitante como `From`;
  - `Reply-To` solo se agrega si el correo fue validado.
- Antispam:
  - honeypot `website`;
  - timestamp `form_started_at`;
  - rechazo de envios demasiado rapidos, bajo 3 segundos;
  - rechazo de timestamps demasiado antiguos.
- Rate limiting simple:
  - maximo 5 intentos por IP por ventana de 1 hora;
  - almacenamiento temporal con `sys_get_temp_dir()`;
  - archivo por hash de IP;
  - bloqueo temporal, no permanente.
- Manejo de errores:
  - mensajes genericos;
  - sin rutas del servidor;
  - sin detalles de PHP, librerias o configuracion.
- Compatibilidad con `assets/vendor/php-email-form/validate.js`:
  - responde `OK` en exito;
  - responde texto simple en error.

## 4. Cambios en `index.html`

Se agregaron dos campos al formulario:

- Honeypot:
  - nombre: `website`;
  - oculto visualmente fuera de pantalla;
  - `aria-hidden="true"`;
  - `tabindex="-1"`;
  - `autocomplete="off"`.
- Timestamp:
  - nombre: `form_started_at`;
  - se completa con JavaScript al cargar la pagina.

No se cambio:

- `action="forms/contact.php"`
- `method="post"`
- `class="php-email-form"`
- nombres existentes de campos principales.

## 5. Contenido y explicacion de `.htaccess`

El archivo `.htaccess` incluye:

- `Options -Indexes`
  - evita listado de directorios.
- `ErrorDocument 404 /404.html`
  - configura pagina 404 personalizada.
- Redireccion HTTPS dentro de `IfModule mod_rewrite.c`
  - fuerza HTTPS cuando el certificado ya este activo;
  - exceptua `localhost` y `127.0.0.1`.
- Bloqueo de archivos ocultos
  - no bloquea `.well-known`, necesario para SSL/validaciones.
- Bloqueo de archivos sensibles o de desarrollo
  - `.env` y otros archivos ocultos mediante rewrite;
  - `composer.json`, `composer.lock`;
  - `package.json`, `package-lock.json`;
  - `vite.config.*`, `webpack.config.*`;
  - `*.sql`, `*.bak`, `*.backup`, `*.old`, `*.zip`, `*.tar`, `*.gz`, `*.log`;
  - `README.md`, `Readme.txt`.
- Headers basicos con `IfModule mod_headers.c`
  - `X-Content-Type-Options: nosniff`;
  - `X-Frame-Options: SAMEORIGIN`;
  - `Referrer-Policy: strict-origin-when-cross-origin`;
  - `Permissions-Policy` conservadora.
- Cache basica con `IfModule mod_expires.c`
  - CSS, JS, imagenes y fuentes por 1 mes.
- Compresion opcional con `IfModule mod_deflate.c`
  - HTML, CSS, JS, JSON y SVG.

No se agrego Content-Security-Policy estricta porque podria romper Google Fonts, Google Maps, scripts locales, BootstrapMade o futuras integraciones. Queda como pendiente para una fase posterior con pruebas visuales.

## 6. Riesgos mitigados

- Uso directo de `$_POST` sin validar.
- Inyeccion de cabeceras de correo.
- Uso del email del visitante como `From`.
- Spam basico por bots simples.
- Envios demasiado rapidos.
- Abuso moderado mediante rate limiting temporal.
- Exposicion de errores tecnicos al usuario.
- Listado de directorios en Apache.
- Acceso web a archivos de respaldo, logs, zips o configuraciones comunes.
- Falta de headers HTTP basicos.

## 7. Riesgos que siguen pendientes

- `mail()` depende de la configuracion del hosting y puede fallar si el servidor no tiene correo saliente bien configurado.
- `no-reply@zeiner.cl` debe existir o estar autorizado por el hosting para mejorar entregabilidad.
- El rate limiting por `sys_get_temp_dir()` depende de permisos del servidor compartido.
- No hay CAPTCHA avanzado; el honeypot/rate limit es una primera barrera.
- El formulario aun no tiene token CSRF. Para este caso simple con formulario publico, el impacto es menor, pero se puede evaluar.
- No hay logging estructurado. Se evito registrar datos personales para minimizar exposicion.
- No se implemento CSP estricta.
- No se auditaron vulnerabilidades de librerias vendor en profundidad.

## 8. Configuracion pendiente en cPanel

- Activar SSL/AutoSSL antes de publicar para que la redireccion HTTPS funcione sin errores.
- Crear o validar `no-reply@zeiner.cl` si se usara como remitente tecnico.
- Confirmar que PHP `mail()` esta habilitado.
- Revisar logs de error del hosting despues de probar el formulario.
- Verificar que `forms/contact.php` tenga permisos seguros, idealmente `0644`.
- Verificar que carpetas tengan permisos seguros, idealmente `0755`.
- Confirmar zona horaria de PHP si se requiere hora local exacta en correos.
- Validar que el dominio tenga SPF, DKIM y DMARC configurados.

## 9. Checklist de pruebas antes de publicar

1. Enviar formulario con datos validos y confirmar que llega a `contacto@zeiner.cl`.
2. Probar formulario sin nombre: debe mostrar error generico.
3. Probar telefono demasiado corto: debe mostrar error generico.
4. Probar email invalido: debe mostrar error generico.
5. Probar servicio manipulado fuera de allowlist: debe mostrar error generico.
6. Probar mensaje demasiado corto: debe mostrar error generico.
7. Probar honeypot con valor: debe responder `OK` sin enviar correo.
8. Probar varios envios seguidos desde la misma IP: debe activar limite temporal sin romper la pagina.
9. Probar que `https://dominio.cl/.env` no sea accesible.
10. Probar que `https://dominio.cl/README.md` no sea accesible.
11. Probar que `https://dominio.cl/.well-known/` no quede bloqueado por la regla de archivos ocultos.
12. Probar que `http://dominio.cl` redirige a `https://dominio.cl`.
13. Probar que `404.html` se muestra al entrar a una ruta inexistente.

## 10. Archivos/carpetas recomendados para NO subir a `public_html`

- `.git/`
- `docs/`
- `README.md`
- `Readme.txt`
- `assets/scss/`
- archivos `*.map`
- zips, respaldos o temporales:
  - `*.zip`
  - `*.tar`
  - `*.gz`
  - `*.bak`
  - `*.backup`
  - `*.old`
  - `*.log`
  - `*.sql`
- archivos de configuracion de desarrollo si aparecen:
  - `.env`
  - `composer.json`
  - `composer.lock`
  - `package.json`
  - `package-lock.json`
  - `vite.config.*`
  - `webpack.config.*`

Para publicacion simple, subir solo lo necesario:

- HTML publicos;
- `.htaccess`;
- `assets/css/main.css`;
- `assets/js/main.js`;
- assets vendor efectivamente referenciados;
- imagenes usadas;
- `forms/contact.php`;
- `404.html`.

## 11. Recomendaciones SPF/DKIM/DMARC

- Configurar SPF del dominio para autorizar al servidor de hosting/cPanel a enviar correo.
- Activar DKIM desde cPanel si el proveedor lo permite.
- Agregar DMARC en modo inicial conservador, por ejemplo politica de monitoreo, y endurecer despues de validar entregabilidad.
- Evitar usar el correo del visitante como `From`.
- Usar `Reply-To` con el correo validado del visitante, como quedo implementado.
- Validar que `no-reply@zeiner.cl` exista o sea aceptado por el servidor.

## 12. Pendientes para Fase 6

- Pruebas reales en hosting cPanel con SSL activo.
- Ajustar `forms/contact.php` si el hosting requiere SMTP autenticado.
- Crear `robots.txt` y `sitemap.xml` cuando el dominio final este confirmado.
- Implementar Schema JSON-LD con datos comerciales verificados.
- Evaluar medicion de conversiones no invasiva.
- Revisar dependencias vendor y purgar archivos no usados para despliegue.
- Probar visualmente en mobile y escritorio despues de subir a staging.

