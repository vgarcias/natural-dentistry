/**
 * Natural Dentistry — Main JS
 * Handles: sticky header, mobile nav, carousel, scroll reveals, lightbox
 */

(function () {
  'use strict';

  /* ── Sticky Header ─────────────────────────────────────────── */
  const header = document.getElementById('site-header');
  if (header) {
    const onScroll = () => {
      header.classList.toggle('scrolled', window.scrollY > 60);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ── Hero Entrance ──────────────────────────────────────────── */
  const hero = document.getElementById('hero');
  if (hero) {
    requestAnimationFrame(() => hero.classList.add('loaded'));
  }

  /* ── Mobile Nav Toggle ──────────────────────────────────────── */
  const navToggle = document.querySelector('.nav-toggle');
  const mobileNav = document.querySelector('.mobile-nav');
  if (navToggle && mobileNav) {
    navToggle.addEventListener('click', () => {
      const open = navToggle.classList.toggle('open');
      mobileNav.classList.toggle('open', open);
      document.body.style.overflow = open ? 'hidden' : '';
      navToggle.setAttribute('aria-expanded', String(open));
    });
    // Close on link click
    mobileNav.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        navToggle.classList.remove('open');
        mobileNav.classList.remove('open');
        document.body.style.overflow = '';
        navToggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  /* ── Smooth Anchor Scrolling ────────────────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      const target = document.querySelector(anchor.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      const offset = (header ? header.offsetHeight : 0) + 16;
      const top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });

  /* ── Scroll Reveal ──────────────────────────────────────────── */
  const reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    const ro = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          ro.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    reveals.forEach(el => ro.observe(el));
  } else {
    reveals.forEach(el => el.classList.add('visible'));
  }

  /* ── Testimonials Carousel ──────────────────────────────────── */
  const carouselWrap = document.querySelector('.testimonials-carousel');
  if (carouselWrap) {
    const track   = carouselWrap.querySelector('.testimonials-track');
    const slides  = Array.from(track.querySelectorAll('.testimonial-slide'));
    const prevBtn = carouselWrap.closest('section').querySelector('.carousel-prev');
    const nextBtn = carouselWrap.closest('section').querySelector('.carousel-next');
    const dotsWrap= carouselWrap.closest('section').querySelector('.carousel-dots');

    let current = 0;
    let perView = getSlidesPerView();
    let total   = Math.ceil(slides.length / perView);
    let autoId  = null;

    function getSlidesPerView() {
      if (window.innerWidth >= 1024) return 3;
      if (window.innerWidth >= 768)  return 2;
      return 1;
    }

    function buildDots() {
      if (!dotsWrap) return;
      dotsWrap.innerHTML = '';
      total = Math.ceil(slides.length / perView);
      for (let i = 0; i < total; i++) {
        const d = document.createElement('button');
        d.className = 'carousel-dot' + (i === 0 ? ' active' : '');
        d.setAttribute('aria-label', `Go to slide ${i + 1}`);
        d.addEventListener('click', () => goTo(i));
        dotsWrap.appendChild(d);
      }
    }

    function goTo(idx) {
      current = Math.max(0, Math.min(idx, total - 1));
      const slideWidth = 100 / perView;
      track.style.transform = `translateX(-${current * perView * slideWidth}%)`;
      dotsWrap && dotsWrap.querySelectorAll('.carousel-dot').forEach((d, i) => {
        d.classList.toggle('active', i === current);
      });
    }

    function startAuto() {
      stopAuto();
      autoId = setInterval(() => goTo((current + 1) % total), 5000);
    }
    function stopAuto() { clearInterval(autoId); }

    if (prevBtn) prevBtn.addEventListener('click', () => { stopAuto(); goTo(current - 1); startAuto(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { stopAuto(); goTo(current + 1); startAuto(); });

    /* Swipe */
    let touchStartX = 0;
    track.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
    track.addEventListener('touchend', e => {
      const dx = e.changedTouches[0].clientX - touchStartX;
      if (Math.abs(dx) > 40) { stopAuto(); goTo(dx < 0 ? current + 1 : current - 1); startAuto(); }
    }, { passive: true });

    window.addEventListener('resize', () => {
      const nv = getSlidesPerView();
      if (nv !== perView) {
        perView = nv; current = 0; buildDots(); goTo(0);
      }
    });

    buildDots();
    goTo(0);
    startAuto();
  }

  /* ── Lightbox ───────────────────────────────────────────────── */
  const lightbox = document.querySelector('.lightbox-overlay');
  const lightboxImg = lightbox && lightbox.querySelector('.lightbox-img');

  document.querySelectorAll('[data-lightbox]').forEach(trigger => {
    trigger.addEventListener('click', () => {
      if (!lightbox) return;
      const src = trigger.getAttribute('data-lightbox');
      const alt = trigger.getAttribute('data-lightbox-alt') || '';
      if (lightboxImg) { lightboxImg.src = src; lightboxImg.alt = alt; }
      lightbox.classList.add('active');
      document.body.style.overflow = 'hidden';
    });
  });

  if (lightbox) {
    const closeBtn = lightbox.querySelector('.lightbox-close');
    const close = () => {
      lightbox.classList.remove('active');
      document.body.style.overflow = '';
      if (lightboxImg) lightboxImg.src = '';
    };
    if (closeBtn) closeBtn.addEventListener('click', close);
    lightbox.addEventListener('click', e => { if (e.target === lightbox) close(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });
  }

  /* ── Stat Counter Animation ─────────────────────────────────── */
  const statNums = document.querySelectorAll('.stat-number[data-count]');
  if (statNums.length && 'IntersectionObserver' in window) {
    const countObs = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el    = entry.target;
        const end   = parseInt(el.getAttribute('data-count'), 10);
        const dur   = 1600;
        const start = performance.now();
        const sup   = el.querySelector('sup');
        const supTxt= sup ? sup.outerHTML : '';
        const tick  = now => {
          const t = Math.min((now - start) / dur, 1);
          const ease = t < 0.5 ? 2*t*t : -1+(4-2*t)*t;
          el.textContent = Math.round(ease * end).toLocaleString();
          if (supTxt) el.insertAdjacentHTML('beforeend', supTxt);
          if (t < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
        countObs.unobserve(el);
      });
    }, { threshold: 0.5 });
    statNums.forEach(el => countObs.observe(el));
  }

  /* ── Contact Form ────────────────────────────────────────────── */
  const contactForm = document.getElementById('nd-contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', e => {
      // WordPress/WPForms/CF7 handles submission; this just shows UX feedback
      const btn = contactForm.querySelector('[type="submit"]');
      if (!btn) return;
      btn.disabled = true;
      btn.textContent = 'Sending…';
    });
  }

})();
