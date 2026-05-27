# Manifest de publicacion `public_html` - ZEINER Electronica

Fecha: 2026-05-27  
Dominio esperado: `zeiner.cl`  
URL base esperada: `https://zeiner.cl/`

## 1. Archivos que si deben subirse a `public_html`

Subir estos archivos de la raiz:

- `index.html`
- `404.html`
- `terms.html`
- `privacy.html`
- `.htaccess`
- `robots.txt`
- `sitemap.xml`

Subir estas carpetas:

- `assets/`
- `forms/`

## 2. Archivos especificos necesarios dentro de `assets/`

Mantener como minimo:

- `assets/css/main.css`
- `assets/js/main.js`
- `assets/img/apple-touch-icon.png`
- `assets/img/uploads/logowebzeiner2.png`
- `assets/img/uploads/LogoZeinerD.png`
- `assets/vendor/bootstrap/css/bootstrap.min.css`
- `assets/vendor/bootstrap/js/bootstrap.bundle.min.js`
- `assets/vendor/bootstrap-icons/bootstrap-icons.css`
- `assets/vendor/bootstrap-icons/fonts/bootstrap-icons.woff`
- `assets/vendor/bootstrap-icons/fonts/bootstrap-icons.woff2`
- `assets/vendor/glightbox/css/glightbox.min.css`
- `assets/vendor/glightbox/js/glightbox.min.js`
- `assets/vendor/swiper/swiper-bundle.min.css`
- `assets/vendor/swiper/swiper-bundle.min.js`
- `assets/vendor/purecounter/purecounter_vanilla.js`
- `assets/vendor/php-email-form/validate.js`

Nota: algunas librerias vendor podrian depurarse en una fase posterior, pero si se sube la carpeta `assets/` completa el sitio deberia cargar sin romper rutas.

## 3. Archivos necesarios dentro de `forms/`

- `forms/contact.php`

No subir formularios antiguos o eliminados, por ejemplo:

- `forms/consultation.php`

## 4. Archivos y carpetas que no deberian subirse

No subir a `public_html`:

- `.git/`
- `docs/`
- `README.md`
- `Readme.txt`
- `assets/scss/`
- archivos `*.map`
- archivos `*.zip`
- archivos `*.bak`
- archivos `*.backup`
- archivos `*.old`
- archivos `*.log`
- archivos `*.sql`
- archivos temporales del sistema o del editor
- `.env`
- `composer.json`
- `composer.lock`
- `package.json`
- `package-lock.json`
- `vite.config.*`
- `webpack.config.*`

## 5. Archivos opcionales

- `docs/`: util para administracion del proyecto, pero no recomendado en sitio publico.
- `README.md` y `Readme.txt`: no aportan al usuario final.
- `assets/scss/`: util para desarrollo, no necesario si ya existe `assets/css/main.css`.
- archivos `.map`: utiles para depuracion, no recomendados en produccion.

## 6. Archivos que requieren validacion antes de publicar

- `terms.html`
  - revisar placeholders legales antes de publicacion final.
- `privacy.html`
  - revisar placeholders legales antes de publicacion final.
- `forms/contact.php`
  - probar en hosting real.
  - confirmar si `mail()` funciona o si se requiere SMTP.
  - confirmar `no-reply@zeiner.cl`.
- `.htaccess`
  - probar que no genere error 500.
  - confirmar SSL/AutoSSL antes de depender de redireccion HTTPS.
- `robots.txt`
  - confirmar que bloquea `/docs/` y `/forms/`, sin bloquear assets.
- `sitemap.xml`
  - confirmar URL final `https://zeiner.cl/`.

## 7. Recomendacion operativa

Para una primera publicacion segura:

1. Subir los archivos publicables a una carpeta de prueba o staging si el hosting lo permite.
2. Probar `index.html`, `terms.html`, `privacy.html`, `404.html`, `robots.txt`, `sitemap.xml` y formulario.
3. Revisar logs de cPanel.
4. Solo despues reemplazar el sitio anterior o apuntar dominio a esta carpeta.

