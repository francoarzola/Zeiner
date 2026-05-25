# Auditoria inicial - Sitio web ZEINER Electronica

Fecha de auditoria: 2026-05-25  
Repositorio revisado: `francoarzola/Zeiner`  
Alcance: sitio web publico de ZEINER Electronica, taller local de reparacion electronica legacy con mas de 30 anos de funcionamiento.

> Este informe se limita al proyecto ZEINER Electronica. No se usa contexto de D&A Systems, IFC, soporte TI B2B, infraestructura TI ni otros proyectos anteriores.

## 1. Diagnostico general

El proyecto corresponde a una exportacion de BootstrapMade Builder basada en el template ATLAS, con una pagina principal parcialmente adaptada a ZEINER Electronica y varias paginas auxiliares que aun conservan contenido generico del template.

El objetivo comercial del sitio esta bien encaminado en `index.html`: se entiende que es un taller de reparacion electronica, se destacan mas de 30 anos de experiencia, se muestran servicios relevantes y se prioriza WhatsApp, telefono, ubicacion y formulario. Sin embargo, el sitio todavia no esta listo para publicarse en cPanel porque existen problemas de produccion, SEO, seguridad y contenido legal.

Los riesgos principales antes de publicar son:

- enlaces de contacto en el header y hero con placeholders `+569XXXXXXXX`;
- seccion real de contacto con id `contacto`, pero multiples enlaces apuntan a `#contact`;
- imagenes principales y favicon referenciados, pero no existentes en el repositorio;
- formulario PHP con correo destino placeholder y entrada `$_POST` usada sin validacion propia suficiente;
- paginas `terms.html`, `privacy.html`, `service-details.html`, `portfolio-details.html`, `starter-page.html` y `404.html` con textos heredados del template;
- ausencia de `.htaccess`, `robots.txt` y `sitemap.xml`;
- SEO tecnico incompleto: `lang="en"`, titulos genericos, meta description vacia, sin Open Graph ni JSON-LD;
- carpeta `assets/vendor` contiene multiples archivos no usados o innecesarios para produccion, incluyendo mapas `.map` y variantes no referenciadas.

La recomendacion general es ejecutar una fase de saneamiento antes de hacer mejoras visuales: corregir enlaces, assets, SEO base, formulario, paginas legales y configuracion cPanel. Luego se puede pasar a una fase de optimizacion visual/conversion.

## 2. Mapa de archivos relevantes

### Raiz del proyecto

- `index.html`: pagina principal del sitio. Es el archivo mas adaptado a ZEINER. Contiene hero, servicios, trayectoria, proceso, confianza, FAQ, contacto, mapa, formulario y footer.
- `404.html`: pagina de error heredada del template, con textos en ingles/genericos, formulario de busqueda sin funcion real y enlaces de header con placeholders.
- `terms.html`: pagina de terminos heredada del template, en ingles y con lorem/template. No sirve aun como terminos para taller tecnico en Chile.
- `privacy.html`: pagina de privacidad heredada del template, en ingles y con contenido generico. No refleja los datos reales recolectados por formulario, WhatsApp, correo o mapa.
- `service-details.html`: pagina detalle de servicio heredada del template. Contiene contenido ajeno al rubro, como `Operational Excellence Framework`, formulario de consulta generico y `forms/consultation.php`.
- `portfolio-details.html`: pagina heredada tipo portfolio/proyecto, no coherente con el objetivo de contacto rapido de un taller electronico.
- `starter-page.html`: pagina starter del template, sin valor para produccion.
- `README.md` y `Readme.txt`: archivos informativos breves de exportacion. No son necesarios en `public_html`.

### Formularios

- `forms/contact.php`: handler del formulario principal en `index.html`. Usa la libreria `PHP_Email_Form`, correo destino placeholder y datos de `$_POST` directamente.
- `forms/consultation.php`: handler asociado a `service-details.html`. No corresponde al flujo actual del sitio ZEINER y mantiene textos/subject genericos.

### CSS / SCSS

- `assets/css/main.css`: CSS compilado principal. Incluye estilos para secciones reales y tambien para secciones heredadas no necesarias.
- `assets/scss/main.scss`: entrada SCSS.
- `assets/scss/_variables.scss`: variables del template. El CSS compilado mantiene `--accent-color: #0c5af7`, mas cercano a azul Bootstrap que a la identidad verde/grafito de ZEINER.
- `assets/scss/layouts/*`: header, nav, footer, general, preloader, scrolltop, page titles.
- `assets/scss/sections/_hero.scss`, `_about.scss`, `_services.scss`, `_how-we-work.scss`, `_features.scss`, `_faq.scss`, `_contacto.scss`: secciones utiles para el sitio ZEINER.
- `assets/scss/sections/_privacy.scss`, `_terms-of-service.scss`, `_service-details.scss`, `_portfolio-details.scss`, `_starter-section.scss`, `_error-404.scss`: secciones de soporte/template; algunas podrian mantenerse si se reescriben, otras conviene eliminar de produccion.

### JavaScript

- `assets/js/main.js`: JS principal del template. Maneja header al hacer scroll, mobile nav, preloader, scroll-top, GLightbox, PureCounter, FAQ, Swiper y scrollspy. Es funcional, pero carga componentes que tal vez no se usan en la pagina final.
- `assets/vendor/php-email-form/validate.js`: validacion AJAX del formulario BootstrapMade.
- `assets/vendor/bootstrap/js/bootstrap.bundle.min.js`: Bootstrap usado por menu/tabs/componentes.
- `assets/vendor/glightbox`, `assets/vendor/swiper`, `assets/vendor/purecounter`: librerias heredadas; deben mantenerse solo si se usan.

### Imagenes

- `assets/img/uploads/logowebzeiner2.png`: logo header, existe.
- `assets/img/uploads/LogoZeinerD.png`: logo footer, existe.
- `assets/img/apple-touch-icon.png`: existe.
- `assets/img/zeiner/taller-zeiner-hero.webp`: referenciada en `index.html`, pero no existe.
- `assets/img/zeiner/taller-zeiner-about.webp`: referenciada en `index.html`, pero no existe.
- `assets/img/uploads/favicon512 app Zeiner.png`: referenciada como favicon en varias paginas, pero no existe.
- `assets/img/portfolio/*`, `assets/img/services/services-3.webp`, `assets/img/person/person-f-5.webp`: imagenes heredadas de template/portfolio, no necesariamente adecuadas para ZEINER.

### Archivos faltantes importantes

- `.htaccess`: no existe.
- `robots.txt`: no existe.
- `sitemap.xml`: no existe.
- favicon real referenciado por HTML: no existe.
- carpeta/imagenes `assets/img/zeiner/*`: no existe.

## 3. Secciones actuales del sitio

### `index.html`

- Header fijo con logo, menu, telefono y WhatsApp.
- Hero con propuesta de reparacion electronica.
- Bloques rapidos de servicios: televisores/LED, linea blanca, musica/electronica.
- About / trayectoria.
- Trust strip: diagnostico, experiencia, atencion directa.
- Servicios de reparacion electronica.
- Como trabajamos.
- Features / por que elegir ZEINER.
- FAQ.
- Contacto y ubicacion.
- Mapa Google embed.
- Tarjetas de direccion, WhatsApp, telefono y atencion.
- Formulario de consulta tecnica.
- Footer.

Observacion: la estructura es adecuada para captar contactos locales, pero hay errores de enlaces y assets que impiden considerarla lista.

### `terms.html`

Pagina legal heredada del template, no adaptada al taller. Contiene secciones en ingles como `Agreement`, `Ownership`, `User Duties`, `Prohibited Use`, `Warranty Disclaimers`, `Indemnification Terms`, etc. Debe reemplazarse por terminos simples para reparacion electronica en Chile, sin clausulas abusivas ni renuncia de derechos del consumidor.

### `privacy.html`

Pagina heredada del template, no adaptada a la realidad del sitio. Habla de practicas genericas como credenciales, transacciones financieras, analytics e informacion de plataforma, lo que no corresponde al sitio actual. Debe reemplazarse por una politica simple para nombre, telefono, correo, mensaje, datos del equipo, WhatsApp, correo, hosting y mapa/analytics si se usan.

### `404.html`

Pagina heredada con contenido en ingles, formulario de busqueda sin funcion real y botones genericos. Debe simplificarse y orientar a volver al inicio o contactar por WhatsApp.

### `service-details.html`, `portfolio-details.html`, `starter-page.html`

Paginas heredadas de ATLAS sin utilidad clara para el objetivo actual. Pueden generar indexacion basura, confundir usuarios y exponer formularios o textos ajenos al rubro. Recomendacion: eliminar de produccion o convertirlas en paginas reales solo si se define un uso especifico.

## 4. Problemas detectados por prioridad

### Alta prioridad

1. Enlaces de contacto con placeholders en header y hero
   - Archivos: `index.html`, `terms.html`, `privacy.html`, `404.html`, `service-details.html`, `portfolio-details.html`, `starter-page.html`.
   - Evidencia: enlaces `tel:+569XXXXXXXX` y `https://wa.me/569XXXXXXXX`.
   - Impacto: usuarios no podran llamar/escribir desde zonas clave del sitio.
   - Recomendacion: reemplazar por `+56984469093` y mensaje WhatsApp definitivo, si ese numero es el oficial.

2. Ancla de contacto inconsistente
   - Archivo principal: `index.html`.
   - Evidencia: el menu y multiples CTA apuntan a `#contact`, pero la seccion real es `<section id="contacto">`.
   - Impacto: CTA rotos, mala experiencia mobile y menor conversion.
   - Recomendacion: unificar a `#contacto` o renombrar la seccion a `contact`; actualizar footer y paginas auxiliares.

3. Imagenes principales inexistentes
   - Archivo: `index.html`.
   - Evidencia: `assets/img/zeiner/taller-zeiner-hero.webp` y `assets/img/zeiner/taller-zeiner-about.webp` no existen.
   - Impacto: hero/about se ven rotos; baja confianza.
   - Recomendacion: agregar fotos reales optimizadas o cambiar referencias a assets existentes adecuados.

4. Favicon inexistente
   - Archivos: todas las paginas HTML.
   - Evidencia: `assets/img/uploads/favicon512 app Zeiner.png` esta referenciado, pero no existe.
   - Impacto: error 404, perdida de senal de marca, posible ruido en logs.
   - Recomendacion: crear favicon real sin espacios en nombre, por ejemplo `assets/img/favicon.png`.

5. Paginas legales no adaptadas
   - Archivos: `terms.html`, `privacy.html`.
   - Impacto: baja confianza, contenido legal incorrecto o irrelevante.
   - Recomendacion: reescribir terminos y privacidad para taller de reparacion en Chile, con placeholders cuando falten datos legales.

6. Formulario PHP inseguro/no preparado
   - Archivos: `forms/contact.php`, `forms/consultation.php`.
   - Evidencia: `contact@example.com`, uso directo de `$_POST`, sin honeypot, sin rate limiting, sin validacion backend suficiente, sin control de metodo HTTP.
   - Impacto: formulario no envia a destino real; riesgo de spam, abuso e inyeccion de cabeceras si no se controla correctamente.
   - Recomendacion: reescribir handler con validacion, sanitizacion, limites de longitud, honeypot, rate limit simple, mensajes genericos y correo destino real.

7. Falta `.htaccess` para cPanel
   - Impacto: sin HTTPS forzado, sin bloqueo de directory listing, sin proteccion basica de archivos sensibles, sin cache de assets.
   - Recomendacion: crear `.htaccess` compatible con sitio estatico/PHP simple.

8. Páginas auxiliares con contenido ajeno a ZEINER
   - Archivos: `service-details.html`, `portfolio-details.html`, `starter-page.html`, `404.html`.
   - Impacto: riesgo de indexacion de contenido falso/generico y mala percepcion profesional.
   - Recomendacion: eliminar de produccion o convertir en paginas reales.

### Media prioridad

1. SEO tecnico incompleto
   - Archivos: HTML principales.
   - Problemas: `lang="en"`, title generico, meta description vacia, keywords vacio, sin canonical, sin Open Graph, sin schema JSON-LD.
   - Recomendacion: ajustar a SEO local para reparacion electronica en La Reina/Santiago.

2. Falta `robots.txt` y `sitemap.xml`
   - Impacto: indexacion menos ordenada.
   - Recomendacion: crear ambos cuando se defina dominio definitivo.

3. Identidad visual no completamente sincronizada
   - Archivo: `assets/css/main.css`, `assets/scss/_variables.scss`.
   - Evidencia: `--accent-color: #0c5af7`; la identidad adjunta usa verde/grafito.
   - Impacto: la UI puede sentirse mas generica/BootstrapMade que ZEINER.
   - Recomendacion: alinear variables a paleta ZEINER sin romper contraste.

4. Dependencias/librerias cargadas aunque posiblemente no se usen
   - Archivos: HTML y `assets/vendor`.
   - Impacto: mas peso, mas superficie de mantenimiento.
   - Recomendacion: mantener Bootstrap e iconos; evaluar si GLightbox, Swiper y PureCounter son necesarios tras limpiar paginas.

5. Valor de diagnostico inconsistente
   - Archivo: `index.html`.
   - Evidencia: aparece `$20.000` en nota hero y `$10.000` en badge/servicios/FAQ.
   - Impacto: confusion comercial.
   - Recomendacion: definir un unico valor o explicar diferencia entre taller/domicilio.

6. Navegacion en paginas internas apunta a anclas locales inexistentes
   - Archivos: `terms.html`, `privacy.html`, `404.html`, `service-details.html`, `portfolio-details.html`, `starter-page.html`.
   - Impacto: menu no funciona fuera de `index.html`.
   - Recomendacion: usar rutas `index.html#services`, `index.html#about`, `index.html#contacto`.

7. Contacto rapido parcial
   - `index.html` tiene tarjetas de contacto visibles, pero header/hero aun usan placeholders.
   - Recomendacion: corregir placeholders y mantener WhatsApp como CTA principal.

### Baja prioridad

1. Archivos `.map`, CSS/JS no minificados y variantes RTL/ESM no usadas
   - Impacto: peso de repositorio y posible exposicion de estructura fuente del vendor.
   - Recomendacion: excluir de despliegue cPanel si no se necesitan.

2. README minimo
   - Impacto: baja mantenibilidad.
   - Recomendacion: documentar pasos de publicacion, archivos excluidos y configuracion del formulario.

3. Sin medicion de conversiones
   - Impacto: no se sabra que canal genera consultas.
   - Recomendacion: fase posterior con eventos para WhatsApp, telefono, correo, mapa y formulario, sin tracking invasivo.

## 5. Archivos que deberian modificarse

### Modificacion requerida antes de publicar

- `index.html`
  - Corregir `lang`, title, meta description, Open Graph, canonical.
  - Corregir links `#contact` / `#contacto`.
  - Corregir placeholders de WhatsApp y telefono.
  - Corregir valor del diagnostico.
  - Corregir referencias a imagenes inexistentes.
  - Agregar enlaces a terminos y privacidad en footer.
  - Agregar JSON-LD local si se confirma datos del negocio.

- `terms.html`
  - Reemplazar contenido completo por terminos para taller de reparacion electronica en Chile.
  - Corregir menu, title, meta, idioma y CTA.

- `privacy.html`
  - Reemplazar contenido completo por politica de privacidad simple.
  - Incluir datos recolectados: nombre, telefono, correo, mensaje y datos del equipo.
  - Incluir canales/proveedores: hosting, correo, WhatsApp, Google Maps/Analytics si aplica.

- `404.html`
  - Reescribir texto y botones.
  - Corregir placeholders y enlaces.
  - Eliminar busqueda sin funcion.

- `forms/contact.php`
  - Reescribir o endurecer validacion backend.
  - Configurar correo destino real.
  - Agregar honeypot, rate limit simple, limites de longitud y control de metodo.
  - Evitar exponer errores tecnicos.

- `assets/css/main.css` y/o SCSS fuente
  - Ajustar color de marca si se decide alinear con paleta ZEINER.
  - Ajustar estilos si se agregan campos antispam o mensajes legales.

- `.htaccess`
  - Crear archivo para cPanel.

- `robots.txt`
  - Crear archivo.

- `sitemap.xml`
  - Crear archivo cuando se confirme dominio final.

### Revisar si deben eliminarse o excluirse de produccion

- `service-details.html`
- `portfolio-details.html`
- `starter-page.html`
- `forms/consultation.php`
- assets `portfolio`, `person`, `services` si no se usan.
- archivos `.map` de vendor.
- variantes Bootstrap no usadas: CSS/JS completos, RTL, ESM, grid/utilities standalone, segun dependencias finales.

## 6. Recomendaciones de mejora

### Conversion y marketing local

- Mantener el sitio como landing corporativa simple, sin ecommerce, cotizador ni reserva online.
- Priorizar WhatsApp como CTA principal en hero, menu mobile, servicios, FAQ y footer.
- Usar mensaje prellenado mas util:
  - `Hola, quisiera consultar por la reparacion de un equipo. El equipo es: [tipo de equipo] y la falla es: [describir falla].`
- Unificar texto de diagnostico y evitar contradicciones de precio.
- Agregar microcopy claro: `Mientras mas detalles entregues, mejor podremos orientar la revision inicial.`
- Evitar frases grandilocuentes; el tono actual en `index.html` es sobrio y adecuado.

### UX / arquitectura

- Corregir todos los enlaces internos rotos.
- Convertir menus de paginas internas a enlaces absolutos relativos hacia `index.html#...`.
- Mantener una sola pagina principal con secciones claras.
- No publicar paginas heredadas sin uso real.
- Verificar mobile luego de corregir assets, especialmente hero, botones, formulario y mapa.

### SEO local

- Cambiar `html lang="en"` a `es-CL`.
- Title sugerido:
  - `Electronica Zeiner | Reparacion de televisores LED y equipos electronicos en La Reina`
- Meta description sugerida:
  - `Taller de electronica con mas de 30 anos de experiencia en La Reina. Reparacion de televisores LED, iluminacion LED, lavadoras, refrigeradores, equipos de musica y electronica general.`
- Agregar Open Graph basico.
- Agregar JSON-LD `LocalBusiness` o subtipo equivalente con datos reales ya visibles en el sitio.
- Crear `robots.txt` y `sitemap.xml`.
- Evitar indexar paginas template sin adaptar.

### Seguridad

- No publicar formulario actual sin ajustes.
- Desactivar errores PHP visibles en produccion.
- Usar `.htaccess` para:
  - forzar HTTPS;
  - desactivar directory listing;
  - bloquear `.git`, `.env`, backups, SQL, logs, zips y archivos de configuracion;
  - headers basicos de seguridad;
  - cache de assets.
- No subir archivos innecesarios a `public_html`.
- Validar SPF/DKIM/DMARC si el formulario enviara correos desde el dominio.

### Imagenes

- Agregar imagenes reales del taller si existen.
- Prioridad visual:
  - fachada o entrada;
  - banco de trabajo;
  - tecnico revisando TV LED;
  - placas, fuentes, herramientas y multimetro;
  - equipos reales en revision.
- Usar nombres SEO sin espacios:
  - `taller-electronica-zeiner-la-reina.webp`
  - `reparacion-tv-led-zeiner.webp`
  - `diagnostico-electronico-zeiner.webp`
- Evitar imagenes futuristas, gamer, de laboratorio generico o demasiado perfectas.

## 7. Riesgos antes de publicar en cPanel

- Los usuarios pueden hacer clic en WhatsApp/telefono del hero y no contactar por placeholders.
- El formulario puede fallar porque el correo destino es `contact@example.com`.
- El formulario puede ser abusado por spam si queda activo sin proteccion.
- Hero y about pueden mostrar imagen rota por assets inexistentes.
- Favicon genera 404.
- Google puede indexar paginas con lorem/template y contenido ajeno al negocio.
- Terminos y privacidad actuales pueden verse poco serios o legalmente inadecuados.
- Sin `.htaccess`, el sitio queda sin controles basicos de hosting compartido.
- Sin `robots.txt`/`sitemap.xml`, la indexacion queda menos controlada.
- Los archivos `.map` y variantes no usadas aumentan peso del despliegue y ruido.
- Menus internos no funcionan correctamente fuera de `index.html`.
- El valor de diagnostico inconsistente puede generar reclamos o perdida de confianza.

## 8. Proxima fase sugerida

### Fase 1 - Saneamiento antes de publicar

1. Corregir enlaces de telefono/WhatsApp y anclas `#contact`/`#contacto`.
2. Agregar o corregir favicon e imagenes principales.
3. Unificar valor de diagnostico.
4. Reescribir `terms.html`, `privacy.html` y `404.html`.
5. Endurecer `forms/contact.php` o desactivar formulario temporalmente y dejar WhatsApp como canal principal.
6. Crear `.htaccess`, `robots.txt` y `sitemap.xml`.
7. Ajustar SEO base: `lang`, title, meta description, Open Graph, canonical y JSON-LD.
8. Excluir paginas y assets heredados no usados de produccion.

### Fase 2 - Verificacion visual y mobile

1. Levantar sitio local.
2. Probar desktop y mobile.
3. Revisar que no existan imagenes rotas.
4. Revisar que todos los CTAs lleven a WhatsApp, telefono, correo, mapa o formulario.
5. Probar menu mobile.
6. Probar formulario con destino real o dejarlo desactivado.

### Fase 3 - Publicacion cPanel

1. Subir solo archivos necesarios.
2. Activar SSL y verificar redireccion HTTPS.
3. Probar formulario, WhatsApp, telefono y mapa en dominio real.
4. Verificar permisos recomendados: carpetas `755`, archivos `644`.
5. Revisar logs iniciales por errores 404.
6. Enviar sitemap a Google Search Console cuando el dominio este activo.

### Fase 4 - Medicion liviana

1. Medir clics en WhatsApp.
2. Medir clics en telefono.
3. Medir clics en correo.
4. Medir clics en mapa.
5. Medir envio exitoso de formulario si se mantiene.
6. Documentar en politica de privacidad si se usa Google Analytics u otra herramienta.

