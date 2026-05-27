# Checklist de publicacion - ZEINER Electronica

Fecha: 2026-05-27  
Dominio: `zeiner.cl`  
URL esperada: `https://zeiner.cl/`

## 1. Antes de subir archivos

- [ ] Confirmar que el dominio `zeiner.cl` apunta al hosting correcto.
- [ ] Confirmar que `public_html` corresponde al dominio correcto.
- [ ] Confirmar SSL/AutoSSL activo en cPanel.
- [ ] Confirmar version PHP disponible en el hosting.
- [ ] Confirmar que PHP `mail()` funciona o definir SMTP si el hosting lo requiere.
- [ ] Confirmar existencia o autorizacion de `no-reply@zeiner.cl`.
- [ ] Confirmar que `contacto@zeiner.cl` recibe correos correctamente.
- [ ] Confirmar SPF del dominio.
- [ ] Confirmar DKIM del dominio.
- [ ] Confirmar DMARC del dominio.
- [ ] Confirmar que el valor de diagnostico `$10.000` esta validado por el dueno.
- [ ] Completar razon social en `terms.html` y `privacy.html`.
- [ ] Completar RUT en `terms.html` y `privacy.html`.
- [ ] Completar representante legal, si aplica.
- [ ] Completar horario de atencion.
- [ ] Completar fecha de actualizacion.
- [ ] Confirmar si `/docs/` se subira o no. Recomendacion: no subir.
- [ ] Confirmar que no se subira `.git/`.
- [ ] Confirmar que no se subiran archivos `.map`, respaldos, zips, logs ni temporales.

## 2. Archivos a subir

- [ ] `index.html`
- [ ] `404.html`
- [ ] `terms.html`
- [ ] `privacy.html`
- [ ] `.htaccess`
- [ ] `robots.txt`
- [ ] `sitemap.xml`
- [ ] `assets/`
- [ ] `forms/contact.php`

## 3. Despues de subir archivos

- [ ] Abrir `https://zeiner.cl/`.
- [ ] Abrir `https://zeiner.cl/404.html`.
- [ ] Abrir `https://zeiner.cl/terms.html`.
- [ ] Abrir `https://zeiner.cl/privacy.html`.
- [ ] Abrir `https://zeiner.cl/robots.txt`.
- [ ] Abrir `https://zeiner.cl/sitemap.xml`.
- [ ] Probar una URL inexistente y confirmar que carga la pagina 404.
- [ ] Confirmar que `http://zeiner.cl/` redirige a `https://zeiner.cl/`.
- [ ] Confirmar que `.htaccess` no genera error 500.
- [ ] Confirmar que no se lista ningun directorio.
- [ ] Confirmar que `https://zeiner.cl/.well-known/` no queda bloqueado indebidamente si AutoSSL lo necesita.

## 4. Pruebas de contacto

- [ ] Probar boton de WhatsApp.
- [ ] Confirmar que WhatsApp usa `56984469093`.
- [ ] Probar telefono desde movil.
- [ ] Confirmar enlace `tel:+56984469093`.
- [ ] Probar enlace `mailto:contacto@zeiner.cl`.
- [ ] Probar enlace de Google Maps.
- [ ] Confirmar que el footer muestra telefono, correo y direccion correctos.

## 5. Pruebas de formulario

- [ ] Enviar formulario con datos validos.
- [ ] Confirmar recepcion en `contacto@zeiner.cl`.
- [ ] Revisar carpeta spam.
- [ ] Probar email invalido.
- [ ] Probar telefono invalido.
- [ ] Probar servicio manipulado fuera de allowlist.
- [ ] Probar mensaje muy corto.
- [ ] Probar honeypot de forma controlada.
- [ ] Probar rate limit de forma controlada.
- [ ] Revisar logs de error de cPanel despues de las pruebas.

## 6. QA visual y funcional

- [ ] Revisar home en desktop.
- [ ] Revisar home en mobile.
- [ ] Revisar menu mobile.
- [ ] Revisar hero y CTAs.
- [ ] Revisar servicios.
- [ ] Revisar seccion de contacto.
- [ ] Revisar terminos y privacidad en mobile.
- [ ] Revisar que no haya placeholders legales visibles.
- [ ] Revisar que no haya textos de template en ingles.
- [ ] Revisar que no haya referencias a proyectos ajenos.

## 7. SEO y post-publicacion

- [ ] Validar `robots.txt`.
- [ ] Validar `sitemap.xml`.
- [ ] Enviar sitemap a Google Search Console.
- [ ] Solicitar indexacion de `https://zeiner.cl/`.
- [ ] Crear o revisar Google Business Profile.
- [ ] Confirmar consistencia NAP:
  - nombre comercial;
  - telefono;
  - direccion;
  - categoria;
  - servicios;
  - enlace web.
- [ ] Revisar resultados de busqueda despues de indexacion.

## 8. Seguridad operativa

- [ ] No subir `.git/`.
- [ ] No subir `docs/`, salvo decision consciente.
- [ ] No subir `assets/scss/`.
- [ ] No subir archivos `.map`.
- [ ] No subir respaldos ni zips.
- [ ] Validar permisos de archivos: idealmente `0644`.
- [ ] Validar permisos de carpetas: idealmente `0755`.
- [ ] Revisar logs de error durante la primera semana.

