/**
 * JMHOF 2027 — Countdown Timer
 * Reads data-ceremony-date from .ceremony-countdown element.
 * Uses tabular figures — digits never reflow.
 * Respects prefers-reduced-motion (freezes ticking).
 */

(function () {
  'use strict';

  const el = document.querySelector('.ceremony-countdown');
  if (!el) return;

  const targetDate = new Date(el.dataset.ceremonyDate);
  if (isNaN(targetDate)) return;

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const dayEl  = el.querySelector('[data-unit="days"]');
  const hrEl   = el.querySelector('[data-unit="hours"]');
  const minEl  = el.querySelector('[data-unit="minutes"]');
  const secEl  = el.querySelector('[data-unit="seconds"]');

  function pad(n) {
    return String(n).padStart(2, '0');
  }

  function update() {
    const now  = Date.now();
    const diff = targetDate - now;

    if (diff <= 0) {
      // Ceremony has passed — show zeros
      [dayEl, hrEl, minEl, secEl].forEach(el => { if (el) el.textContent = '00'; });
      return;
    }

    const days    = Math.floor(diff / 86400000);
    const hours   = Math.floor((diff % 86400000) / 3600000);
    const minutes = Math.floor((diff % 3600000)  / 60000);
    const seconds = Math.floor((diff % 60000)    / 1000);

    if (dayEl)  dayEl.textContent  = String(days).padStart(3, '0');
    if (hrEl)   hrEl.textContent   = pad(hours);
    if (minEl)  minEl.textContent  = pad(minutes);
    if (secEl)  secEl.textContent  = pad(seconds);
  }

  // Initial render
  update();

  // Tick — skip if reduced motion (show static snapshot)
  if (!reducedMotion) {
    setInterval(update, 1000);
  }

})();
