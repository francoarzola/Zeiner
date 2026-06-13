(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');

    if (!selectHeader) return;

    if (
      !selectHeader.classList.contains('scroll-up-sticky') &&
      !selectHeader.classList.contains('sticky-top') &&
      !selectHeader.classList.contains('fixed-top')
    ) {
      return;
    }

    window.scrollY > 100
      ? selectBody.classList.add('scrolled')
      : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
  const navmenu = document.querySelector('#navmenu');
  const navmenuList = document.querySelector('#navmenu > ul');

  function setMobileNavState(isActive) {
    document.body.classList.toggle('mobile-nav-active', isActive);

    if (!mobileNavToggleBtn) return;

    const icon = mobileNavToggleBtn.querySelector('i');

    if (icon) {
      icon.classList.toggle('bi-list', !isActive);
      icon.classList.toggle('bi-x', isActive);
    }

    mobileNavToggleBtn.setAttribute('aria-expanded', isActive ? 'true' : 'false');
    mobileNavToggleBtn.setAttribute('aria-label', isActive ? 'Cerrar menú' : 'Abrir menú');
  }

  function mobileNavToggle() {
    setMobileNavState(!document.body.classList.contains('mobile-nav-active'));
  }

  function mobileNavClose() {
    setMobileNavState(false);
  }

  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      mobileNavToggle();
    });
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach((navLink) => {
    navLink.addEventListener('click', () => {
      if (
        document.body.classList.contains('mobile-nav-active') &&
        !navLink.classList.contains('toggle-dropdown')
      ) {
        mobileNavClose();
      }
    });
  });

  document.addEventListener('click', function(e) {
    if (!document.body.classList.contains('mobile-nav-active')) return;
    if (!navmenu || !navmenuList || !mobileNavToggleBtn) return;

    const clickInsideMenu = navmenuList.contains(e.target);
    const clickOnToggle = mobileNavToggleBtn.contains(e.target);

    if (!clickInsideMenu && !clickOnToggle) {
      mobileNavClose();
    }
  });

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && document.body.classList.contains('mobile-nav-active')) {
      mobileNavClose();
      if (mobileNavToggleBtn) mobileNavToggleBtn.focus();
    }
  });

  /**
   * Toggle mobile nav dropdowns
   * Se mantiene por compatibilidad, aunque Zeiner actualmente no usa dropdowns.
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();

      if (this.parentNode) {
        this.parentNode.classList.toggle('active');
      }

      if (this.parentNode && this.parentNode.nextElementSibling) {
        this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      }

      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');

  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  const scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (!scrollTop) return;

    window.scrollY > 100
      ? scrollTop.classList.add('active')
      : scrollTop.classList.remove('active');
  }

  if (scrollTop) {
    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();

      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);
  }

  /**
   * Frequently Asked Questions Toggle
   * Mejorado: solo escucha el header y activa/desactiva el .faq-item correspondiente.
   */
  document.querySelectorAll('.faq-item .faq-header').forEach((faqHeader) => {
    faqHeader.addEventListener('click', () => {
      const faqItem = faqHeader.closest('.faq-item');

      if (faqItem) {
        faqItem.classList.toggle('faq-active');
      }
    });
  });

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function() {
    if (window.location.hash) {
      const section = document.querySelector(window.location.hash);

      if (section) {
        setTimeout(() => {
          const scrollMarginTop = getComputedStyle(section).scrollMarginTop;

          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop || 0),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  const navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;

      const section = document.querySelector(navmenulink.hash);

      if (!section) return;

      const position = window.scrollY + 200;

      if (
        position >= section.offsetTop &&
        position <= section.offsetTop + section.offsetHeight
      ) {
        document
          .querySelectorAll('.navmenu a.active')
          .forEach(link => link.classList.remove('active'));

        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    });
  }

  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

})();
