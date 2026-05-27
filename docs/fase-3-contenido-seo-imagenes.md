# Fase 3 - Contenido comercial, SEO local, espanol e imagenes

Fecha: 2026-05-25  
Proyecto: ZEINER Electronica  
Alcance: contenido visible, SEO basico, localizacion al espanol de Chile, atributos `alt` e informe de imagenes.

> Esta fase se limita al sitio de ZEINER Electronica, taller de reparacion electronica legacy. No se usa contexto de D&A Systems, IFC, ifcsoluciones.cl, soporte TI B2B, infraestructura TI ni otros proyectos anteriores.

## 1. Resumen de cambios realizados

- Se mejoro el `title` y la `meta description` de `index.html` para orientar el sitio a taller de reparacion electronica local.
- Se ajusto el hero para comunicar con mayor rapidez:
  - taller de electronica en La Reina;
  - reparacion de televisores LED y equipos electronicos;
  - mas de 30 anos de trayectoria;
  - contacto rapido por WhatsApp o llamada.
- Se separaron los servicios principales en siete bloques visibles:
  - Televisores LED
  - Iluminacion LED
  - Lavadoras
  - Refrigeradores
  - Equipos de musica
  - Consolas
  - Electronica general
- Se corrigieron microcopys para evitar tono generico de template, marketing exagerado o lenguaje de empresa TI.
- Se reescribio la FAQ para responder dudas reales de un taller de reparacion:
  - equipos que reparan;
  - consulta por WhatsApp;
  - aprobacion antes de reparar;
  - plazos referenciales;
  - garantia segun tipo de reparacion;
  - equipos sin reparacion;
  - diagnostico tecnico;
  - diagnostico a domicilio.
- Se ajustaron atributos `alt` de logos e imagenes activas.
- Se ajusto `404.html` para mantener lenguaje coherente con reparacion y contacto rapido.
- Se mantuvieron intactos los cambios fuera de alcance: legales, seguridad avanzada, `.htaccess`, `robots.txt`, `sitemap.xml`, analytics y Schema completo.

## 2. Archivos modificados

- `index.html`
  - Metadatos SEO basicos.
  - Hero.
  - Bloques destacados.
  - Servicios.
  - Seccion de confianza.
  - FAQ.
  - Footer y atributos `alt`.

- `404.html`
  - Microcopy de la pagina no encontrada.
  - Atributos `alt` y nombres accesibles.
  - Footer coherente con los servicios reales.

- `docs/fase-3-contenido-seo-imagenes.md`
  - Informe documental de la fase.

No se modificaron en esta fase:

- `terms.html`
- `privacy.html`
- `.htaccess`
- `sitemap.xml`
- `robots.txt`
- `forms/contact.php`
- archivos de analytics
- Schema JSON-LD completo

## 3. Textos principales ajustados

### Hero

Texto reforzado:

- H1: `Reparacion de televisores LED y equipos electronicos`
- Bajada: `Mas de 30 anos reparando equipos electronicos. Servicio tecnico para televisores LED, iluminacion LED, lavadoras, refrigeradores, equipos de musica, consolas y electronica general. Contactanos por WhatsApp y cuentanos la falla de tu equipo.`

### Servicios

Se dejaron servicios concretos, sin lenguaje de software, nube, soporte corporativo ni promesas exageradas. Las descripciones usan formulas prudentes como:

- `segun evaluacion tecnica`;
- `diagnostico`;
- `evaluar reparacion`;
- `depende de la falla y disponibilidad de repuestos`.

### FAQ

La FAQ ahora evita convertir diagnosticos, plazos o garantias en promesas cerradas. Se informa que la reparacion se realiza solo con aprobacion del cliente y que los plazos dependen del equipo, la falla y la carga de trabajo.

### 404

La pagina 404 queda orientada a volver al inicio o contactar por WhatsApp, sin buscador ficticio ni textos del template.

## 4. Mejoras SEO aplicadas

- `lang="es-CL"` ya estaba aplicado desde la fase anterior y se mantuvo.
- `title` de `index.html` orientado a busqueda local:
  - `ZEINER Electronica | Taller de reparacion electronica en La Reina`
- `meta description` de `index.html` orientada a servicios reales y CTA:
  - menciona mas de 30 anos;
  - televisores LED;
  - iluminacion LED;
  - lavadoras;
  - refrigeradores;
  - equipos de musica;
  - consolas;
  - electronica general;
  - contacto por WhatsApp.
- Se mantuvo un unico H1 claro en la pagina principal.
- Se reforzaron H2/H3 con palabras clave naturales, sin sobreoptimizar.
- Se uso la ubicacion visible ya existente en el sitio: La Reina, Region Metropolitana.
- No se agrego Schema JSON-LD completo en esta fase porque el alcance lo deja para una fase posterior.
- No se agregaron `robots.txt`, `sitemap.xml` ni analytics por restriccion expresa del alcance.

## 5. Textos en ingles corregidos o detectados

En `index.html` y `404.html` no se detectaron textos visibles heredados en ingles del template despues de la limpieza.

Se mantienen terminos tecnicos inevitables o no visibles para usuario, como:

- clases CSS;
- nombres de archivos;
- nombres de librerias;
- atributos tecnicos HTML;
- rutas de assets;
- comentarios HTML de estructura.

Pendiente fuera de esta fase: `terms.html` y `privacy.html` aun requieren reescritura legal completa en espanol de Chile.

## 6. Imagenes revisadas

Imagenes activas actuales:

- `assets/img/uploads/logowebzeiner2.png`
  - Uso: logo en header y bloque de trayectoria.
  - Estado: existe.
  - Alt ajustado: `Logo de ZEINER Electronica` / `Marca ZEINER Electronica con mas de 30 anos de trayectoria`.
  - Observacion: funciona como respaldo, pero no reemplaza una foto real del taller.

- `assets/img/uploads/LogoZeinerD.png`
  - Uso: hero y footer.
  - Estado: existe.
  - Alt ajustado: `Logo de ZEINER Electronica para taller de reparacion electronica` / `Logo de ZEINER Electronica`.
  - Observacion: refuerza marca, pero el hero ganaria confianza con una imagen real de taller o banco de trabajo.

- `assets/img/apple-touch-icon.png`
  - Uso: favicon y apple touch icon.
  - Estado: existe.
  - Observacion: conviene validar que sea el icono oficial final y que exista una version favicon dedicada en fase posterior.

No hay fotos reales activas del taller, banco de trabajo, equipos en reparacion, fachada ni herramientas.

## 7. Imagenes recomendadas para reemplazo futuro

Prioridad recomendada:

1. Foto real del banco de trabajo con herramientas, placas o televisor en revision.
2. Foto real de un televisor LED en diagnostico.
3. Foto real de fachada o acceso al taller, si ayuda a encontrarlo.
4. Foto real de equipos de audio o electronica general en revision.
5. Foto real de iluminacion LED o componentes LED.

Nombres de archivo sugeridos:

- `assets/img/zeiner/taller-electronica-zeiner-la-reina.webp`
- `assets/img/zeiner/reparacion-televisores-led-zeiner.webp`
- `assets/img/zeiner/banco-trabajo-electronica-zeiner.webp`
- `assets/img/zeiner/diagnostico-electronico-zeiner.webp`

Atributos `alt` sugeridos:

- `Banco de trabajo de ZEINER Electronica para diagnostico de equipos electronicos`
- `Televisor LED en revision tecnica en ZEINER Electronica`
- `Taller ZEINER Electronica en La Reina`

Evitar imagenes:

- laboratorios futuristas;
- imagenes demasiado genericas de stock;
- fotos estilo startup/software;
- imagenes gamer para representar consolas;
- imagenes con promesas visuales de equipamiento no disponible.

## 8. Datos comerciales que requieren validacion

- Diagnostico tecnico: se mantiene `$10.000` porque ya estaba presente y fue unificado en fase anterior. Debe validarlo el dueno antes de publicar.
- Direccion visible: `Leonardo Da Vinci 6852, La Reina, Region Metropolitana`. Debe validarse contra Google Business Profile y datos comerciales oficiales antes de publicar.
- Diagnostico a domicilio: se mantiene como posibilidad `segun coordinacion`. Debe validarse operacionalmente.
- Garantia: se menciona de forma prudente, sin plazo especifico. Debe definirse en terminos y condiciones con validacion profesional.
- Horarios: no se agregaron porque no estan confirmados.
- Nombre legal, RUT y razon social: no se agregaron porque no estan confirmados.

## 9. Pendientes para Fase 4

- Reescribir `terms.html` para taller de reparacion electronica en Chile.
- Reescribir `privacy.html` para datos enviados por formulario, WhatsApp, correo, mapa y eventuales analytics.
- Endurecer `forms/contact.php`:
  - validacion backend;
  - sanitizacion;
  - honeypot;
  - rate limiting simple;
  - control de metodo HTTP;
  - proteccion contra inyeccion de cabeceras;
  - mensajes genericos de error.
- Crear `.htaccess` compatible con cPanel.
- Crear `robots.txt` y `sitemap.xml` cuando el dominio final este confirmado.
- Implementar Schema JSON-LD de negocio local con datos verificados.
- Evaluar Open Graph completo cuando exista imagen social definitiva.
- Agregar fotos reales optimizadas del taller.
- Probar visualmente en mobile y escritorio antes de publicar.

## 10. Riesgos o dudas detectadas

- El sitio aun depende visualmente de logos porque no hay fotos reales disponibles. Esto es aceptable como respaldo, pero reduce confianza frente a usuarios que buscan un taller local real.
- El monto de diagnostico aparece como dato comercial activo. Debe ser validado antes de publicar.
- La direccion esta presente y fue usada para SEO local, pero debe coincidir exactamente con Google Business Profile.
- `terms.html` y `privacy.html` siguen pendientes de reescritura legal; no deben publicarse como contenido final si conservan textos heredados.
- El formulario sigue pendiente de seguridad. No fue modificado en profundidad por alcance de esta fase.
- No se implementaron analytics, Schema, sitemap, robots ni `.htaccess` porque pertenecen a fases posteriores.

