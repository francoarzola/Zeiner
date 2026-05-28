# Fase 11 - SEO local final para ZEINER.CL

Fecha: 2026-05-27
Proyecto: ZEINER Electronica
Dominio objetivo: `https://zeiner.cl/`
Alcance: optimizacion SEO local prudente del home, sin tocar formulario, seguridad, robots, sitemap, legales, assets ni analytics.

## 1. Resumen de cambios realizados

- Se ajusto el enfoque SEO local del home para reforzar la busqueda "servicio tecnico electronico en La Reina".
- Se actualizo el `title` y la `meta description` de `index.html`.
- Se actualizo el H1 del hero.
- Se ajusto la bajada del hero para mencionar La Reina, mas de 30 anos, televisores LED, servicio tecnico electronico y contacto por WhatsApp.
- Se agrego un parrafo visible y breve de contexto local dentro de la seccion de trayectoria.
- Se reforzo la introduccion de servicios con una mencion natural a La Reina.
- Se amplio el Schema JSON-LD `LocalBusiness` con datos confirmados y prudentes.
- No se agregaron scripts externos, analytics, ratings, reviews, horarios, coordenadas ni comunas inventadas.

## 2. Archivos modificados

- `index.html`
  - `title`.
  - `meta description`.
  - Open Graph basico.
  - H1 y texto principal del hero.
  - Parrafo local visible en la seccion de trayectoria.
  - Introduccion de servicios.
  - Schema JSON-LD `LocalBusiness`.

- `docs/fase-11-seo-local-zeiner.md`
  - Documentacion de esta fase.

No se modificaron:

- `forms/contact.php`
- `forms/csrf-token.php`
- `.htaccess`
- `storage/.htaccess`
- `.gitignore`
- `robots.txt`
- `sitemap.xml`
- `terms.html`
- `privacy.html`
- `assets/`
- logica del formulario
- contenido legal de fondo
- analytics

Nota: el documento `docs/fase-8-limpieza-huellas-template-zeiner.md` no se encontro en el repositorio al iniciar esta fase. Se continuo usando los documentos disponibles de fases anteriores.

## 3. Cambios en title/meta

### Antes

- Title: `ZEINER Electronica | Taller de reparacion electronica en La Reina`
- Meta description: enfocada en trayectoria y servicios, pero con menor fuerza para la intencion local principal.

### Ahora

- Title: `Servicio tecnico electronico en La Reina | ZEINER Electronica`
- Meta description: `Servicio tecnico electronico en La Reina. Mas de 30 anos reparando televisores LED, iluminacion LED, lavadoras, refrigeradores, equipos de musica, consolas y electronica general. Contacta por WhatsApp.`

Criterio usado:

- Mantener marca + busqueda local.
- Evitar keyword stuffing.
- Mantener texto claro para personas que necesitan reparar un equipo.

## 4. Cambios en H1/hero

### H1 implementado

`Servicio tecnico electronico en La Reina`

### Bajada del hero

Se ajusto para comunicar:

- mas de 30 anos de trayectoria;
- reparacion de televisores LED;
- servicio tecnico electronico;
- ubicacion en La Reina;
- contacto rapido por WhatsApp.

La redaccion se mantuvo directa y comercial, sin promesas exageradas.

## 5. Cambios en contenido local

Se agrego un bloque visible breve dentro de la seccion de trayectoria:

- menciona ZEINER Electronica;
- menciona Leonardo Da Vinci 6852;
- menciona La Reina;
- menciona diagnostico tecnico;
- menciona reparacion electronica y televisores LED;
- orienta a consultar por WhatsApp o telefono.

Tambien se reforzo la introduccion de servicios para indicar que la revision tecnica se realiza en La Reina, sin repetir la comuna artificialmente en cada tarjeta.

## 6. Cambios en Schema

Se mantuvo el tipo `LocalBusiness` y se agregaron datos confirmados:

- `@id`: `https://zeiner.cl/#localbusiness`
- `logo`: `https://zeiner.cl/assets/img/uploads/logowebzeiner2.png`
- `hasMap`: enlace de Google Maps ya usado en el sitio.
- `contactPoint`: telefono, atencion general, area `CL`, idioma `Spanish`.
- `knowsAbout`: servicios confirmados del taller.

No se agrego:

- `openingHours`, porque no hay horario confirmado.
- `sameAs`, porque no hay redes sociales confirmadas.
- `aggregateRating`, `review` ni rating.
- `priceRange`, porque no hay rango comercial confirmado.
- `geo`, latitud ni longitud.
- `image` con foto real, porque aun no existe una imagen social/fotografica adecuada confirmada.

## 7. Decision sobre og:image

No se agrego `og:image`.

Motivo:

- El sitio aun no cuenta con una imagen social real y claramente adecuada para compartir.
- No conviene usar una imagen generica o de baja calidad como imagen principal de WhatsApp/redes.

Recomendacion futura:

- Crear una imagen 1200x630 px para compartir en WhatsApp y redes.
- Incluir logo ZEINER.
- Incluir la frase `Servicio tecnico electronico en La Reina`.
- Incluir telefono/WhatsApp `+56 9 8446 9093`.
- Usar una foto real del taller, fachada o banco de trabajo si esta disponible.

## 8. Decision sobre FAQPage Schema

No se implemento `FAQPage` JSON-LD en esta fase.

Motivo:

- Las preguntas frecuentes existen y son utiles, pero algunas respuestas tocan materias operativas sensibles como garantia, diagnostico y atencion a domicilio.
- Es preferible validar primero contenido final legal/operativo, horario, condiciones y valor de diagnostico antes de exponer esas respuestas como datos estructurados.

Pendiente recomendado:

- Implementar FAQPage solo cuando los textos visibles de FAQ esten validados por el dueno y alineados con terminos/privacidad finales.

## 9. Checklist externo post-publicacion

- Crear o verificar Google Business Profile.
- Usar nombre exacto: `ZEINER Electronica`.
- Agregar direccion: `Leonardo Da Vinci 6852, La Reina`.
- Agregar telefono: `+56 9 8446 9093`.
- Agregar web: `https://zeiner.cl/`.
- Elegir categoria correcta de servicio tecnico/taller electronico segun opciones disponibles en Google.
- Agregar horario real cuando este confirmado.
- Subir fotos reales del taller.
- Subir foto de fachada o referencia de ubicacion.
- Subir fotos de banco de trabajo y equipos reales.
- Conseguir resenas reales de clientes.
- Responder resenas con tono profesional y cercano.
- Crear Google Search Console.
- Enviar `https://zeiner.cl/sitemap.xml`.
- Verificar indexacion con `site:zeiner.cl`.
- Revisar consultas reales de busqueda.
- Medir clics a WhatsApp si mas adelante se agrega analitica.

## 10. Pendientes antes de publicacion final

- Completar placeholders legales si aun existen en `terms.html` y `privacy.html`.
- Confirmar valor de diagnostico `$10.000`.
- Confirmar horario real de atencion.
- Confirmar fotos reales del taller.
- Confirmar o crear Google Business Profile.
- Probar formulario en cPanel real.
- Confirmar recepcion de correos y configuracion SPF/DKIM/DMARC.

## 11. Recomendacion final de proximos pasos

El home queda mejor orientado a SEO local para La Reina sin sobreoptimizar. La siguiente mejora con mayor impacto no esta dentro del codigo: completar Google Business Profile, subir fotos reales, pedir resenas reales y validar Search Console despues de publicar.

Para una fase posterior, conviene evaluar:

- imagen social `og:image` 1200x630;
- FAQPage Schema validado;
- medicion no invasiva de clics a WhatsApp, telefono, correo y formulario;
- contenido adicional solo si responde a preguntas reales de clientes, no paginas artificiales por comuna.
