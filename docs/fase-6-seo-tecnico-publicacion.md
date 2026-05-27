# Fase 6 - SEO tecnico, publicacion y QA final

Fecha: 2026-05-27  
Proyecto: ZEINER Electronica  
Dominio objetivo: `https://zeiner.cl/`  
Alcance: SEO tecnico basico, `robots.txt`, `sitemap.xml`, Schema JSON-LD prudente y checklist final de publicacion en cPanel.

## 1. Resumen de cambios realizados

- Se agrego canonical en paginas indexables.
- Se agrego `meta robots` segun el tipo de pagina.
- Se agrego Open Graph basico en `index.html`, sin `og:image` porque no existe aun una foto real/social adecuada.
- Se agrego Schema JSON-LD prudente en `index.html` usando `LocalBusiness` y solo datos confirmados.
- Se creo `robots.txt`.
- Se creo `sitemap.xml`.
- Se revisaron enlaces internos, rutas de imagenes y referencias a paginas eliminadas.
- Se dejo documentado que Twitter Card queda pendiente hasta contar con una imagen social adecuada.

## 2. Archivos modificados

- `index.html`
  - `meta robots`.
  - canonical.
  - Open Graph basico.
  - Schema JSON-LD `LocalBusiness`.

- `404.html`
  - `meta robots` con `noindex, follow`.

- `terms.html`
  - canonical.
  - `meta robots`.

- `privacy.html`
  - canonical.
  - `meta robots`.

- `robots.txt`
  - creado para `https://zeiner.cl/`.

- `sitemap.xml`
  - creado con URLs activas publicas.

- `docs/fase-6-seo-tecnico-publicacion.md`
  - informe de la fase y checklist final.

No se modificaron:

- `forms/contact.php`
- `.htaccess`
- contenido legal de fondo
- contenido comercial de fondo
- analytics
- imagenes binarias

## 3. Metadatos revisados

### `index.html`

- `lang="es-CL"` confirmado.
- Title: `ZEINER Electrónica | Taller de reparación electrónica en La Reina`
- Meta description orientada a reparacion de equipos y contacto.
- Canonical: `https://zeiner.cl/`
- Robots: `index, follow`
- Open Graph:
  - `og:title`
  - `og:description`
  - `og:type`
  - `og:url`
  - `og:site_name`
  - `og:locale`
- No se agrego `og:image` por falta de imagen real/social adecuada.
- No se agrego Twitter Card por falta de imagen adecuada.

### `404.html`

- `lang="es-CL"` confirmado.
- Title y meta description en espanol.
- Robots: `noindex, follow`
- Sin canonical por decision prudente: la pagina 404 no debe indexarse.

### `terms.html`

- `lang="es-CL"` confirmado.
- Title y meta description en espanol.
- Canonical: `https://zeiner.cl/terms.html`
- Robots: `index, follow`

### `privacy.html`

- `lang="es-CL"` confirmado.
- Title y meta description en espanol.
- Canonical: `https://zeiner.cl/privacy.html`
- Robots: `index, follow`

## 4. `robots.txt` creado

Contenido:

- Permite indexacion general.
- Bloquea `/docs/`.
- Bloquea `/forms/`.
- No bloquea assets necesarios para renderizado:
  - `/assets/css/`
  - `/assets/js/`
  - `/assets/img/`
- Declara sitemap:
  - `https://zeiner.cl/sitemap.xml`

## 5. `sitemap.xml` creado

URLs incluidas:

- `https://zeiner.cl/`
- `https://zeiner.cl/terms.html`
- `https://zeiner.cl/privacy.html`

Campos incluidos por URL:

- `loc`
- `lastmod`
- `changefreq`
- `priority`

## 6. Schema JSON-LD implementado

Se agrego en `index.html` un Schema prudente:

- Tipo: `LocalBusiness`
- Datos incluidos:
  - `name`: ZEINER Electronica
  - `url`: `https://zeiner.cl/`
  - `telephone`: `+56 9 8446 9093`
  - `email`: `contacto@zeiner.cl`
  - `description`: taller de electronica con mas de 30 anos de trayectoria
  - `address`:
    - `streetAddress`: Leonardo Da Vinci 6852
    - `addressLocality`: La Reina
    - `addressRegion`: Region Metropolitana
    - `addressCountry`: CL
  - `areaServed`:
    - La Reina
    - Region Metropolitana

No se agregaron datos no confirmados:

- horarios;
- redes sociales;
- coordenadas;
- reviews;
- rating;
- `priceRange`;
- RUT;
- razon social;
- imagen social;
- logo social.

## 7. URLs incluidas y excluidas

Incluidas en sitemap:

- Home.
- Terminos y condiciones.
- Politica de privacidad.

Excluidas:

- `404.html`, por ser pagina de error con `noindex`.
- `/docs/`, por ser documentacion interna del proyecto.
- `/forms/`, por ser endpoint tecnico.
- `/assets/`, por no ser paginas de contenido.
- Paginas eliminadas del template:
  - `portfolio-details.html`
  - `service-details.html`
  - `starter-page.html`
- `forms/consultation.php`, eliminado en fases anteriores.

## 8. Checklist QA final

1. Verificar que `https://zeiner.cl/` abre correctamente.
2. Verificar que `http://zeiner.cl/` redirige a HTTPS solo despues de tener SSL activo.
3. Probar home en desktop y mobile.
4. Probar `404.html` visitando una URL inexistente.
5. Probar `terms.html`.
6. Probar `privacy.html`.
7. Probar boton de WhatsApp.
8. Probar enlace telefonico en mobile.
9. Probar enlace `mailto:contacto@zeiner.cl`.
10. Probar enlace de Google Maps.
11. Probar formulario con datos validos.
12. Probar formulario con email invalido.
13. Probar formulario con telefono invalido.
14. Probar formulario con servicio manipulado fuera de allowlist.
15. Probar formulario con mensaje muy corto.
16. Probar honeypot.
17. Probar envios repetidos para confirmar rate limit.
18. Revisar logs de error de cPanel.
19. Revisar recepcion del correo en `contacto@zeiner.cl`.
20. Revisar carpeta spam.
21. Validar `robots.txt`.
22. Validar `sitemap.xml`.
23. Enviar sitemap a Google Search Console.
24. Revisar Google Business Profile y consistencia NAP.
25. Revisar que no existan textos legales con placeholders antes de publicar final.

## 9. Checklist cPanel / `public_html`

Subir a `public_html`:

- `index.html`
- `404.html`
- `terms.html`
- `privacy.html`
- `.htaccess`
- `robots.txt`
- `sitemap.xml`
- `assets/css/main.css`
- `assets/js/main.js`
- assets vendor referenciados por HTML:
  - Bootstrap CSS/JS usado;
  - Bootstrap Icons usado;
  - GLightbox CSS/JS si se mantiene referenciado;
  - Swiper CSS/JS si se mantiene referenciado;
  - PureCounter si se mantiene referenciado;
  - `php-email-form/validate.js`;
- imagenes usadas:
  - `assets/img/apple-touch-icon.png`
  - `assets/img/uploads/logowebzeiner2.png`
  - `assets/img/uploads/LogoZeinerD.png`
- `forms/contact.php`

No subir, salvo necesidad administrativa clara:

- `.git/`
- `docs/`
- `README.md`
- `Readme.txt`
- `assets/scss/`
- archivos `*.map`
- respaldos, logs, zips, SQL o temporales.

## 10. Pendientes antes de publicar

- Validar legalmente `terms.html` y `privacy.html`.
- Reemplazar placeholders legales:
  - razon social;
  - RUT;
  - representante, si aplica;
  - horario;
  - fecha de actualizacion.
- Validar el valor de diagnostico `$10.000`.
- Confirmar direccion exacta con Google Business Profile.
- Activar SSL/AutoSSL en cPanel.
- Confirmar que `no-reply@zeiner.cl` existe o que el hosting permite usarlo como remitente.
- Configurar SPF, DKIM y DMARC.
- Probar `forms/contact.php` en hosting real.
- Revisar si `mail()` funciona o si se requiere SMTP autenticado.

## 11. Pendientes post-publicacion

- Enviar `sitemap.xml` a Google Search Console.
- Crear o actualizar Google Business Profile.
- Verificar indexacion de `https://zeiner.cl/`.
- Revisar logs de errores 404 reales.
- Medir clics de WhatsApp, telefono, correo y mapa con una solucion no invasiva si se decide implementar analytics.
- Agregar fotos reales del taller y preparar imagen social para Open Graph/Twitter Card.
- Evaluar una CSP en fase posterior con pruebas cuidadosas.

## 12. Riesgos o dudas detectadas

- El sitio aun usa logos como imagenes principales; faltan fotos reales del taller.
- No se agrego `og:image` ni Twitter Card por falta de imagen social adecuada.
- GLightbox, Swiper y PureCounter siguen referenciados aunque el sitio podria funcionar con menos dependencias; conviene revisar purga despues de QA visual.
- `docs/` queda bloqueado en `robots.txt`, pero si se sube a `public_html` igual podria ser accesible por URL directa; se recomienda no subirlo.
- Los placeholders legales no deben quedar publicados en version final.
- El formulario debe probarse en cPanel real porque depende de configuracion del hosting.

