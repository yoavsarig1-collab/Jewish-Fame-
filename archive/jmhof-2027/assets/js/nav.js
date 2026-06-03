/**
 * JMHOF 2027 — Navigation JS
 * Sticky scroll shrink, mobile menu toggle, active page state.
 */

(function () {
  'use strict';

  const header = document.querySelector('.site-header');
  const menuToggle = document.querySelector('.menu-toggle');
  const siteNav = document.querySelector('.site-nav');

  // ─── STICKY SCROLL SHRINK ────────────────────────────────────────
  if (header) {
    const onScroll = () => {
      header.classList.toggle('scrolled', window.scrollY > 20);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // init
  }

  // ─── MOBILE MENU TOGGLE ──────────────────────────────────────────
  if (menuToggle && siteNav) {
    menuToggle.addEventListener('click', () => {
      const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', String(!isOpen));
      siteNav.classList.toggle('is-open', !isOpen);
      document.body.style.overflow = !isOpen ? 'hidden' : '';
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && siteNav.classList.contains('is-open')) {
        menuToggle.setAttribute('aria-expanded', 'false');
        siteNav.classList.remove('is-open');
        document.body.style.overflow = '';
        menuToggle.focus();
      }
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!header.contains(e.target) && siteNav.classList.contains('is-open')) {
        menuToggle.setAttribute('aria-expanded', 'false');
        siteNav.classList.remove('is-open');
        document.body.style.overflow = '';
      }
    });
  }

  // ─── ACTIVE NAV ITEM ─────────────────────────────────────────────
  const currentPath = window.location.pathname;
  document.querySelectorAll('.site-nav__link').forEach(link => {
    const linkPath = new URL(link.href, window.location.origin).pathname;
    if (linkPath === currentPath || (linkPath !== '/' && currentPath.startsWith(linkPath))) {
      link.classList.add('current-menu-item');
      link.setAttribute('aria-current', 'page');
    }
  });

})();
