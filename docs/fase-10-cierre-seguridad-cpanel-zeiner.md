# Fase 10 - Cierre de seguridad cPanel

Fecha: 2026-05-27  
Proyecto: ZEINER Electronica  
Alcance: cierre prudente de seguridad en `.htaccess` para publicacion en Apache/cPanel.

## 1. Cambios realizados

- Se mantuvo:
  - `Options -Indexes`
  - `ErrorDocument 404 /404.html`
  - redireccion HTTPS condicionada a SSL activo
  - excepcion para `.well-known`
  - bloqueo de archivos ocultos
  - bloqueo de archivos sensibles
  - headers basicos
  - cache basica
  - compresion opcional
- Se agrego:
  - `ErrorDocument 403 /404.html`
  - bloqueo prudente desde `.htaccess` raiz para:
    - `/storage/`
    - `/docs/`

No se agrego CSP estricta.  
No se agrego HSTS.  
No se tocaron formulario, HTML, Schema, robots, sitemap, assets ni `storage/.htaccess`.

## 2. Riesgos mitigados

- Acceso accidental a `/storage/` si la carpeta se sube a `public_html`.
- Acceso accidental a `/docs/` si la documentacion interna se sube a produccion.
- Listado de directorios.
- Exposicion de archivos ocultos, sin bloquear `.well-known`.
- Exposicion de archivos sensibles, respaldos, logs o zips comunes.
- Experiencia de error mas controlada para 403 y 404.

## 3. Checklist de pruebas en cPanel

1. Confirmar SSL/AutoSSL activo antes de validar redireccion HTTPS.
2. Abrir `https://zeiner.cl/`.
3. Abrir `http://zeiner.cl/` y confirmar redireccion a HTTPS.
4. Abrir una URL inexistente y confirmar que responde la pagina 404.
5. Abrir `https://zeiner.cl/storage/` y confirmar que no muestra contenido.
6. Abrir `https://zeiner.cl/docs/` y confirmar que no muestra contenido.
7. Abrir `https://zeiner.cl/.well-known/` o validar AutoSSL para confirmar que no se rompe.
8. Abrir `https://zeiner.cl/assets/css/main.css` y confirmar que no se bloquean assets.
9. Abrir `https://zeiner.cl/assets/js/main.js` y confirmar que no se bloquean assets.
10. Revisar logs de errores de cPanel para descartar error 500.

## 4. Validacion de `storage/`

- `storage/.htaccess` bloquea la carpeta directamente.
- `.htaccess` raiz tambien bloquea `/storage/` como segunda barrera.
- Los logs operacionales no deben ser publicos.
- `storage/logs/*.log` y `storage/rate-limit/*.json` estan excluidos por `.gitignore`.

## 5. Recomendacion de despliegue

- No subir `/docs/` a `public_html`.
- No subir `.git/` a `public_html`.
- No subir archivos `.map`, respaldos, zips, logs ni SQL.
- Subir `/storage/` solo si el formulario necesita crear logs/rate-limit dentro del sitio y confirmar que queda bloqueado.
- Si el hosting permite una carpeta fuera de `public_html`, preferir mover almacenamiento operacional fuera del directorio publico en una fase posterior.

## 6. MultiPHP INI recomendado

Configurar en cPanel / MultiPHP INI Editor:

```ini
display_errors=Off
log_errors=On
expose_php=Off
```

Adicionalmente, revisar `error_log` desde cPanel despues de las pruebas.

## 7. Correo y entregabilidad

- Confirmar que `contacto@zeiner.cl` recibe correos.
- Confirmar que `no-reply@zeiner.cl` existe o esta autorizado por el hosting.
- Configurar SPF para autorizar el servidor de cPanel.
- Activar DKIM.
- Configurar DMARC inicialmente en modo conservador.
- Probar recepcion en bandeja principal y spam.

## 8. Pruebas de formulario real

Probar en cPanel real:

1. Envio valido.
2. Token CSRF faltante.
3. Token CSRF invalido.
4. Consentimiento de privacidad no marcado.
5. Honeypot activado.
6. Rate limit con envios repetidos.
7. Email invalido.
8. Telefono invalido.
9. Servicio manipulado fuera de allowlist.
10. Mensaje muy corto.

## 9. Pendientes post-publicacion

- Revisar logs durante los primeros dias.
- Confirmar que no hay error 500 por `.htaccess`.
- Revisar si `mail()` cae en spam.
- Evaluar SMTP autenticado si hay problemas de entregabilidad.
- Evaluar HSTS solo despues de confirmar SSL estable en produccion.
- Evaluar CSP en fase posterior con pruebas de Google Fonts, Google Maps y scripts locales.
- Evaluar mover `storage/` fuera de `public_html` si el hosting lo permite.

