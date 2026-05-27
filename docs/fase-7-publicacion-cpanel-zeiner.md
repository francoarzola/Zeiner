# Fase 7 - Preparacion real de publicacion en cPanel

Fecha: 2026-05-27  
Proyecto: ZEINER Electronica  
Dominio esperado: `zeiner.cl`  
URL base esperada: `https://zeiner.cl/`

## 1. Resumen ejecutivo

El sitio ZEINER Electronica esta tecnicamente encaminado para publicacion en cPanel como sitio HTML/PHP simple, pero no deberia publicarse como version final sin completar validaciones operativas y legales pendientes.

Recomendacion: **publicar solo despues de corregir pendientes criticos previos**, especialmente:

- completar placeholders legales en `terms.html` y `privacy.html`;
- validar el valor de diagnostico `$10.000`;
- activar SSL/AutoSSL;
- probar el formulario en hosting real;
- confirmar SPF/DKIM/DMARC y entregabilidad de correo;
- confirmar que `.htaccess` no genere error 500.

No se detecto una correccion tecnica critica que obligara a modificar archivos activos del sitio en esta fase. Esta fase solo genero documentacion de publicacion.

## 2. Estado actual del sitio

Archivos activos principales:

- `index.html`
- `404.html`
- `terms.html`
- `privacy.html`
- `forms/contact.php`
- `.htaccess`
- `robots.txt`
- `sitemap.xml`
- `assets/`

Estado funcional:

- Contacto principal por WhatsApp.
- Telefono y correo visibles.
- Formulario endurecido en PHP.
- Terminos y privacidad redactados, pero con placeholders legales.
- SEO tecnico basico implementado.
- Robots y sitemap creados.
- Schema JSON-LD prudente implementado en home.
- .htaccess conservador creado para cPanel/Apache.

## 3. Archivos listos para publicacion

Se consideran publicables:

- `index.html`
- `404.html`
- `terms.html`, solo si se completan placeholders legales antes de publicar final.
- `privacy.html`, solo si se completan placeholders legales antes de publicar final.
- `.htaccess`
- `robots.txt`
- `sitemap.xml`
- `assets/`
- `forms/contact.php`

Imagenes actualmente usadas:

- `assets/img/apple-touch-icon.png`
- `assets/img/uploads/logowebzeiner2.png`
- `assets/img/uploads/LogoZeinerD.png`

## 4. Archivos que no deberian subirse

No recomendado para `public_html`:

- `.git/`
- `docs/`
- `README.md`
- `Readme.txt`
- `assets/scss/`
- archivos `*.map`
- respaldos, logs, zips, SQL o temporales.

Detectado en el proyecto:

- Existe `.git/`.
- Existe `docs/`.
- Existen `README.md` y `Readme.txt`.
- Existe `assets/scss/`.
- Existen multiples archivos `.map` dentro de `assets/vendor/`.

Estos archivos no son necesarios para el funcionamiento publico del sitio y conviene excluirlos del despliegue.

## 5. Checklist previa

- Confirmar dominio `zeiner.cl` apuntando al hosting correcto.
- Confirmar que `public_html` corresponde al dominio correcto.
- Confirmar SSL/AutoSSL activo.
- Confirmar version PHP disponible.
- Confirmar que PHP `mail()` funciona o definir SMTP.
- Confirmar existencia o configuracion de `no-reply@zeiner.cl`.
- Confirmar SPF, DKIM y DMARC.
- Confirmar que `contacto@zeiner.cl` recibe correos.
- Confirmar valor de diagnostico `$10.000`.
- Completar razon social, RUT, representante, horario y fecha de actualizacion en `terms.html` y `privacy.html`.
- Confirmar que no se subira `.git/`.
- Confirmar que no se subira `docs/`, salvo decision consciente.
- Confirmar que no se subiran archivos `.map`, zips, respaldos, logs ni temporales.

## 6. Checklist posterior

- Abrir `https://zeiner.cl/`.
- Abrir `https://zeiner.cl/404.html`.
- Abrir `https://zeiner.cl/terms.html`.
- Abrir `https://zeiner.cl/privacy.html`.
- Abrir `https://zeiner.cl/robots.txt`.
- Abrir `https://zeiner.cl/sitemap.xml`.
- Probar WhatsApp.
- Probar telefono desde movil.
- Probar correo `mailto:contacto@zeiner.cl`.
- Probar mapa.
- Probar formulario con datos validos.
- Probar formulario con email invalido.
- Probar formulario con telefono invalido.
- Probar formulario con servicio no valido.
- Probar mensaje muy corto.
- Probar honeypot de forma controlada.
- Probar rate limit de forma controlada.
- Revisar carpeta spam.
- Revisar logs de error en cPanel.
- Confirmar que `.htaccess` no genera error 500.
- Confirmar redireccion HTTPS.
- Revisar mobile y desktop.
- Validar sitemap.
- Enviar sitemap a Google Search Console.
- Crear o revisar Google Business Profile.

## 7. Configuracion cPanel recomendada

- Activar SSL/AutoSSL antes de probar redireccion HTTPS.
- Usar PHP compatible con el handler actual.
- Confirmar `mail()` habilitado.
- Validar permisos:
  - archivos: `0644`;
  - carpetas: `0755`.
- Revisar logs de errores despues del despliegue.
- Mantener backup del sitio anterior antes de reemplazarlo.
- Si el formulario falla con `mail()`, evaluar SMTP autenticado.
- No dejar `.git/` dentro de `public_html`.
- No dejar documentos internos en `public_html`.

## 8. Configuracion correo recomendada

- Crear o validar `contacto@zeiner.cl`.
- Crear o validar `no-reply@zeiner.cl`.
- Configurar SPF para autorizar al servidor cPanel.
- Activar DKIM.
- Configurar DMARC inicialmente en modo conservador.
- Probar recepcion del formulario en bandeja principal.
- Revisar spam.
- Si los correos no llegan, cambiar a SMTP autenticado en fase posterior.

## 9. Riesgos pendientes

- `terms.html` y `privacy.html` contienen placeholders legales. No deben publicarse como version final sin completar y validar.
- El valor de diagnostico `$10.000` debe confirmarse con el dueno.
- `mail()` puede fallar o caer en spam si SPF/DKIM/DMARC no esta correctamente configurado.
- `.htaccess` podria causar error 500 si el servidor tiene restricciones particulares.
- El formulario debe probarse en hosting real.
- No hay analytics ni medicion de conversiones todavia.
- No hay fotos reales del taller; el sitio aun usa logos como imagenes principales.
- No se ha hecho QA visual en hosting real.

## 10. Decisiones que debe tomar el dueno antes de publicar

- Confirmar si el diagnostico tecnico es efectivamente `$10.000`.
- Confirmar razon social y RUT.
- Confirmar representante legal, si aplica.
- Confirmar horario de atencion.
- Confirmar si se atiende domicilio y bajo que condiciones.
- Confirmar si se publicaran documentos `terms.html` y `privacy.html` con datos completos.
- Confirmar si se subira `/docs/`. Recomendacion: no subir.
- Confirmar correo tecnico para envio del formulario.
- Confirmar si se desea publicar con las imagenes actuales o esperar fotos reales.

## 11. Revision tecnica final

Busqueda ejecutada sobre archivos activos y documentacion:

- `#contact`
- `XXXXXXXX`
- `contact@example`
- `D&A Systems`
- `IFC`
- `ifcsoluciones.cl`
- `portfolio-details.html`
- `service-details.html`
- `starter-page.html`
- `consultation.php`
- `Lorem ipsum`
- textos visibles heredados del template

Resultado:

- En archivos activos publicos no se detectaron referencias criticas.
- Las coincidencias encontradas aparecen en documentos historicos de auditoria, donde se describen problemas ya corregidos o paginas eliminadas.
- No se modificaron archivos activos del sitio en esta fase.

## 12. Recomendacion final

Recomendacion: **no publicar todavia como version final**.

El sitio puede pasar a staging o a una publicacion controlada de prueba en cPanel, pero la publicacion final deberia esperar a:

1. Completar placeholders legales.
2. Validar valor de diagnostico.
3. Activar SSL/AutoSSL.
4. Probar formulario real.
5. Confirmar correo y DNS de entregabilidad.
6. Revisar visualmente mobile/desktop en el dominio real.

Una vez completados esos puntos, el sitio queda apto para publicacion simple en `public_html`.

