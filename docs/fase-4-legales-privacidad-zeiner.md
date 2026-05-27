# Fase 4 - Terminos, privacidad y garantias para Chile

Fecha: 2026-05-27  
Proyecto: ZEINER Electronica  
Alcance: reescritura preventiva de `terms.html` y `privacy.html` para taller de reparacion electronica en Chile.

> Este documento no reemplaza asesoria legal profesional. Los textos implementados son una base preventiva y deben ser validados por un abogado antes de publicarse como version final.

## 1. Resumen de cambios realizados

- Se reemplazo completamente el contenido heredado del template en `terms.html`.
- Se reemplazo completamente el contenido heredado del template en `privacy.html`.
- Se mantuvo el sitio enfocado en ZEINER Electronica, taller de electronica legacy, sin referencias a ecommerce, reservas, cotizaciones automaticas, software corporativo ni soporte TI B2B.
- Se corrigieron menus internos de ambas paginas para apuntar a:
  - `index.html#hero`
  - `index.html#services`
  - `index.html#about`
  - `index.html#ubicacion`
  - `index.html#contacto`
- Se unificaron datos de contacto:
  - Telefono / WhatsApp: `+56 9 8446 9093`
  - WhatsApp: `56984469093`
  - Correo: `contacto@zeiner.cl`
  - Direccion visible: `Leonardo Da Vinci 6852, La Reina, Region Metropolitana`
- Se incorporaron placeholders para datos legales faltantes:
  - `[NOMBRE LEGAL O RAZON SOCIAL]`
  - `[RUT]`
  - `[REPRESENTANTE LEGAL, SI APLICA]`
  - `[DIRECCION LEGAL, SI ES DISTINTA]`
  - `[HORARIO DE ATENCION]`
  - `[FECHA DE ACTUALIZACION]`
- No se modificaron `forms/contact.php`, `.htaccess`, `robots.txt`, `sitemap.xml`, analytics ni Schema JSON-LD.

## 2. Archivos modificados

- `terms.html`
  - Reescrito como terminos y condiciones para diagnostico y reparacion de equipos electronicos.
  - Redaccion preventiva, clara y compatible con un taller local.

- `privacy.html`
  - Reescrito como politica de privacidad para datos enviados por formulario, WhatsApp, telefono y correo.
  - Se informa que actualmente no hay Google Analytics implementado.

- `docs/fase-4-legales-privacidad-zeiner.md`
  - Informe de cambios, supuestos, riesgos y pendientes.

## 3. Estructura de `terms.html`

La pagina queda organizada en las siguientes secciones:

1. Identificacion del sitio.
2. Alcance del sitio web.
3. Servicios ofrecidos.
4. Diagnostico tecnico.
5. Presupuesto y autorizacion.
6. Plazos de revision y reparacion.
7. Entrega y retiro de equipos.
8. Garantia de reparacion.
9. Repuestos.
10. Equipos manipulados por terceros.
11. Pagos y comprobantes.
12. Comunicacion con el cliente.
13. Derechos del consumidor.
14. Actualizacion de estos terminos.

Puntos relevantes:

- Se indica que el sitio es informativo y de contacto.
- Se aclara que no es ecommerce, no permite comprar online, no genera reservas automaticas ni cotizaciones vinculantes automaticas.
- Se menciona el diagnostico tecnico de `$10.000` como valor actualmente visible, sujeto a confirmacion.
- Se establece que la reparacion requiere aprobacion del cliente.
- Se evita prometer plazos exactos.
- Se incluye garantia por reparacion sin limitar derechos irrenunciables.
- Se incorpora referencia prudente a garantia legal de productos nuevos o repuestos nuevos si eventualmente se venden al consumidor.
- Se evita establecer multas, abandono o disposicion de equipos no retirados sin revision legal.

## 4. Estructura de `privacy.html`

La pagina queda organizada en las siguientes secciones:

1. Responsable del tratamiento.
2. Datos que se recopilan.
3. Finalidad del tratamiento.
4. Base de tratamiento.
5. Conservacion de datos.
6. Comunicacion a terceros.
7. Seguridad de la informacion.
8. Derechos de las personas.
9. Menores de edad.
10. Enlaces y plataformas externas.
11. Cambios a esta politica.

Puntos relevantes:

- Se limita la finalidad a responder consultas, coordinar diagnostico, reparacion, presupuesto, retiro, entrega y respaldo de comunicaciones necesarias.
- Se indica que ZEINER Electronica no vende datos personales.
- Se mencionan proveedores tecnologicos razonables: hosting, correo electronico, WhatsApp y Google Maps.
- Se deja claro que Google Analytics no esta implementado actualmente y que la politica debe actualizarse si se incorpora.
- Se informa el ejercicio de derechos de acceso, rectificacion, cancelacion u oposicion mediante `contacto@zeiner.cl`.

## 5. Datos legales que siguen pendientes

- Nombre legal o razon social.
- RUT.
- Representante legal, si aplica.
- Direccion legal, si es distinta de la direccion visible.
- Horario de atencion.
- Fecha de actualizacion final.
- Condiciones documentales exactas de garantia que se imprimiran o indicaran en boleta, recibo, orden de trabajo o comprobante.
- Politica operativa para equipos no retirados, si se quiere regular con mayor detalle.
- Medios de pago aceptados.

## 6. Supuestos usados

- ZEINER Electronica opera como taller de diagnostico y reparacion, no como ecommerce.
- El sitio busca contacto rapido y no procesa pagos online.
- El formulario del sitio puede recibir nombre, telefono, correo, tipo de equipo y descripcion de falla.
- El canal principal de contacto es WhatsApp.
- El valor de diagnostico visible actual es `$10.000`, pero debe confirmarse antes de publicar.
- La direccion visible del sitio es `Leonardo Da Vinci 6852, La Reina, Region Metropolitana`.
- No hay Google Analytics implementado al momento de esta fase.

## 7. Riesgos legales que requieren validacion profesional

- La redaccion final de garantia de reparacion debe alinearse con los documentos reales del taller: boleta, recibo, orden de trabajo o comprobante.
- La politica para equipos no retirados requiere asesoria legal si se quieren establecer plazos, costos de almacenaje, abandono o disposicion del equipo.
- Si se venden repuestos o productos nuevos, se debe informar correctamente la garantia legal aplicable.
- Si se usan repuestos usados, alternativos o recuperados, debe existir una practica clara de informacion y aceptacion del cliente.
- La entrada en vigencia y obligaciones concretas de la Ley 21.719 deben revisarse antes de publicar politicas definitivas de proteccion de datos.
- El formulario de contacto aun requiere hardening tecnico para reducir spam, abuso y riesgos de seguridad.

## 8. Fuentes oficiales consideradas

- SERNAC: garantia por reparacion, incluyendo obligacion de informar por escrito el plazo de responsabilidad del servicio y plazo de 30 dias habiles para reclamar por servicio defectuoso.
- SERNAC: garantia legal de productos nuevos, con plazo de 6 meses para cambio, devolucion del dinero o reparacion gratuita cuando corresponda.
- Biblioteca del Congreso Nacional: Ley N° 19.496 sobre Proteccion de los Derechos de los Consumidores.
- Biblioteca del Congreso Nacional: Ley N° 19.628 sobre proteccion de la vida privada.
- Biblioteca del Congreso Nacional / normativa chilena vigente: Ley N° 21.719 sobre proteccion de datos personales y preparacion para su entrada en vigencia.

## 9. Pendientes para la siguiente fase

1. Validar legalmente `terms.html` y `privacy.html`.
2. Endurecer `forms/contact.php`:
   - validacion backend;
   - sanitizacion;
   - control de metodo;
   - honeypot;
   - rate limiting;
   - proteccion contra inyeccion de cabeceras;
   - mensajes genericos de error.
3. Crear `.htaccess` compatible con cPanel.
4. Crear `robots.txt` y `sitemap.xml` cuando el dominio final este confirmado.
5. Implementar Schema JSON-LD con datos comerciales verificados.
6. Evaluar eventos de conversion no invasivos para WhatsApp, telefono, correo, formulario y mapa.
7. Reemplazar logos usados como imagenes principales por fotos reales optimizadas del taller.
