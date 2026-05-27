# Fase 2 - Limpieza estructural del template ATLAS

Fecha: 2026-05-25  
Proyecto: ZEINER Electronica  
Objetivo de la fase: reducir restos del template ATLAS y enfocar el sitio en contacto rapido, servicios reales y confianza local.

## Archivos modificados

- `index.html`
  - Se corrigio el idioma base a `es-CL`.
  - Se reemplazo el title y meta description genericos por texto orientado a ZEINER Electronica.
  - Se unificaron enlaces de telefono a `+56 9 8446 9093`, usando `tel:+56984469093`.
  - Se unificaron enlaces de WhatsApp con el numero `56984469093`.
  - Se reemplazo el mensaje de WhatsApp por:
    - `Hola, quisiera consultar por la reparacion de un equipo. El equipo es: [indicar equipo] y la falla es: [describir falla].`
  - Se corrigieron enlaces internos que apuntaban a `#contact`; ahora apuntan a `#contacto`.
  - Se reforzo el hero con mas de 30 anos de trayectoria.
  - Se unifico el diagnostico tecnico en `$10.000`.
  - Se agrego `Consolas` como servicio visible.
  - Se ajusto la seccion `Como trabajamos` a un flujo de 5 pasos.
  - Se cambiaron referencias a imagenes inexistentes por logos existentes del proyecto.
  - Se agregaron enlaces de footer a `terms.html` y `privacy.html`.

- `404.html`
  - Se elimino texto generico del template.
  - Se elimino el formulario de busqueda sin funcion real.
  - Se corrigieron enlaces de navegacion hacia `index.html#...`.
  - Se unificaron telefono, WhatsApp y favicon.
  - Se dejo la pagina enfocada en volver al inicio o contactar por WhatsApp.

- `terms.html`
  - No se reescribio contenido legal en esta fase.
  - Se corrigieron enlaces minimos de navegacion, telefono, WhatsApp y favicon para evitar placeholders.

- `privacy.html`
  - No se reescribio contenido legal en esta fase.
  - Se corrigieron enlaces minimos de navegacion, telefono, WhatsApp y favicon para evitar placeholders.

- `forms/contact.php`
  - Se actualizo el correo receptor a `contacto@zeiner.cl`.
  - No se implemento hardening del formulario en esta fase.

- `assets/scss/_sections.scss`
  - Se retiraron imports SCSS de paginas del template eliminadas.

## Secciones eliminadas

- Pagina `portfolio-details.html`.
- Pagina `service-details.html`.
- Pagina `starter-page.html`.
- Formulario `forms/consultation.php`.
- Imagenes heredadas de portfolio, servicio y persona usadas por paginas ficticias:
  - `assets/img/portfolio/*`
  - `assets/img/services/services-3.webp`
  - `assets/img/person/person-f-5.webp`
- SCSS fuente de secciones heredadas eliminadas:
  - `assets/scss/sections/_portfolio-details.scss`
  - `assets/scss/sections/_service-details.scss`
  - `assets/scss/sections/_starter-section.scss`

## Secciones mantenidas

- Header / navegacion.
- Hero con CTA principal a WhatsApp y CTA secundario a llamada.
- Servicios principales.
- Sobre ZEINER / trayectoria.
- Como trabajamos.
- Seccion de confianza / razones para elegir ZEINER.
- Preguntas frecuentes.
- Contacto con mapa, telefono, WhatsApp, correo y formulario.
- Footer con datos de contacto y enlaces legales existentes.
- `terms.html` y `privacy.html` como paginas pendientes de reescritura legal.

## Secciones reordenadas

No se hizo reordenamiento mayor. Se mantuvo la estructura base de ATLAS ya adaptada:

1. Header
2. Hero
3. Sobre ZEINER / trayectoria
4. Servicios
5. Como trabajamos
6. Confianza
7. Preguntas frecuentes
8. Contacto
9. Footer

El cambio principal fue depurar contenidos y enlaces, no redisenar la arquitectura completa.

## Datos de contacto unificados

- Telefono / WhatsApp: `+56 9 8446 9093`
- Enlaces `tel`: `tel:+56984469093`
- Enlaces WhatsApp: `https://wa.me/56984469093?...`
- Correo: `contacto@zeiner.cl`
- Se mantuvo la direccion visible ya existente en el sitio:
  - Leonardo Da Vinci 6852, La Reina, Region Metropolitana

No se inventaron horarios, certificaciones, testimonios, metricas ni nuevos datos comerciales.

## Riesgos o pendientes detectados

- `terms.html` y `privacy.html` aun conservan contenido generico del template. No se corrigio porque la fase excluia cambios legales.
- El formulario `forms/contact.php` sigue usando la libreria base de BootstrapMade y requiere una fase posterior de seguridad: validacion backend, honeypot, rate limit, control de metodo y mensajes genericos.
- No se implemento `.htaccess`, headers de seguridad, robots, sitemap, schema ni analytics por instruccion de alcance.
- Las imagenes reales del taller siguen pendientes. En esta fase se evitaron rutas rotas usando logos existentes, pero el sitio ganara confianza con fotos reales del taller.
- `assets/css/main.css` todavia contiene estilos compilados de secciones antiguas porque no se recompilo SCSS ni se hizo purga CSS en esta fase.
- Algunas carpetas vacias de imagenes heredadas pueden permanecer en el filesystem local por permisos de OneDrive, aunque sus archivos fueron eliminados del repo.

## Revision final ejecutada

- Se revisaron placeholders `XXXXXXXX`: no quedan en `index.html`, `404.html`, `forms` ni SCSS operativo.
- Se revisaron enlaces `#contact`: no quedan en `index.html` ni `404.html`; se usa `#contacto`.
- Se reviso que el telefono oficial este unificado como `+56 9 8446 9093` / `+56984469093`.
- Se reviso que `contacto@zeiner.cl` este presente en footer y formulario PHP.
- Se eliminaron paginas con contenido ficticio de portfolio, servicio y starter.
- Se reviso que no haya referencias operativas a D&A Systems, IFC, ifcsoluciones.cl ni servicios TI B2B en los archivos activos del sitio.

## Proxima fase recomendada

Fase 3 deberia concentrarse en contenido legal y seguridad antes de publicar:

1. Reescribir `terms.html` para taller de reparacion electronica en Chile.
2. Reescribir `privacy.html` para datos recolectados por formulario, WhatsApp, correo y mapa.
3. Endurecer `forms/contact.php`.
4. Crear `.htaccess` compatible con cPanel.
5. Crear `robots.txt`, `sitemap.xml` y SEO tecnico completo.
6. Agregar imagenes reales del taller y optimizarlas.
7. Probar visualmente en mobile antes de publicar.

