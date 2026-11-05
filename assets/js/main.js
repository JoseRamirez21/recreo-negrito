(() => {
  'use strict';
  const $  = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  /* Preloader */
  window.addEventListener('load', () => {
    setTimeout(() => $('#preloader')?.classList.add('hide'), 450);
  });

  /* Transición entre páginas */
  const transition = $('#pageTransition');
  $$('a[href]').forEach(a => {
    const href = a.getAttribute('href');
    const internal = a.hostname === location.hostname && !a.target && !href.startsWith('#') && !href.startsWith('tel:');
    if (!internal) return;
    a.addEventListener('click', e => {
      if (e.metaKey || e.ctrlKey || e.shiftKey) return;
      e.preventDefault();
      transition.classList.add('active');
      setTimeout(() => (location.href = a.href), 520);
    });
  });
  window.addEventListener('pageshow', () => transition?.classList.remove('active'));

  /* Navbar */
  const nav = $('#nav');
  const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 60);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  const burger = $('#burger'), menu = $('#menu');
  burger?.addEventListener('click', () => {
    burger.classList.toggle('open');
    menu.classList.toggle('open');
  });

  /* Reveal al hacer scroll */
  const io = new IntersectionObserver((entries) => {
    entries.forEach(en => {
      if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
    });
  }, { threshold: 0.12 });
  $$('.reveal').forEach(el => io.observe(el));

  /* Contadores animados */
  const counterIO = new IntersectionObserver((entries) => {
    entries.forEach(en => {
      if (!en.isIntersecting) return;
      const el = en.target, end = +el.dataset.count, dur = 1800, t0 = performance.now();
      const tick = (t) => {
        const p = Math.min((t - t0) / dur, 1);
        el.textContent = Math.floor(end * (1 - Math.pow(1 - p, 3)));
        if (p < 1) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
      counterIO.unobserve(el);
    });
  }, { threshold: 0.6 });
  $$('[data-count]').forEach(el => counterIO.observe(el));

  /* Parallax del hero */
  const parallax = $('[data-parallax]');
  if (parallax && !matchMedia('(prefers-reduced-motion: reduce)').matches) {
    window.addEventListener('scroll', () => {
      const y = window.scrollY;
      if (y < window.innerHeight * 1.2) parallax.style.transform = `translateY(${y * 0.35}px) scale(1.05)`;
    }, { passive: true });
  }

  /* Brasas flotantes */
  const embers = $('.embers');
  if (embers) {
    for (let i = 0; i < 28; i++) {
      const e = document.createElement('span');
      e.className = 'ember';
      e.style.cssText = `left:${Math.random()*100}%;--s:${2+Math.random()*5}px;--d:${6+Math.random()*8}s;--delay:${Math.random()*8}s;--x:${(Math.random()*160-80)}px`;
      embers.appendChild(e);
    }
  }

  /* Carrusel de testimonios */
  const track = $('.t-track');
  if (track) {
    const slides = $$('.t-slide', track), dots = $('.t-dots');
    let i = 0, timer;
    slides.forEach((_, n) => {
      const b = document.createElement('button');
      b.setAttribute('aria-label', 'Testimonio ' + (n + 1));
      b.addEventListener('click', () => { go(n); restart(); });
      dots.appendChild(b);
    });
    const go = (n) => {
      i = (n + slides.length) % slides.length;
      track.style.transform = `translateX(-${i * 100}%)`;
      $$('button', dots).forEach((b, k) => b.classList.toggle('on', k === i));
    };
    const restart = () => { clearInterval(timer); timer = setInterval(() => go(i + 1), 5500); };
    go(0); restart();
  }

  /* Cursor personalizado */
  const dot = $('#cursorDot'), ring = $('#cursorRing');
  if (dot && ring && matchMedia('(hover:hover) and (pointer:fine)').matches) {
    let mx = 0, my = 0, rx = 0, ry = 0;
    window.addEventListener('mousemove', e => {
      mx = e.clientX; my = e.clientY;
      dot.style.opacity = ring.style.opacity = 1;
      dot.style.transform = `translate(${mx}px,${my}px)`;
    });
    (function loop() {
      rx += (mx - rx) * 0.16; ry += (my - ry) * 0.16;
      ring.style.transform = `translate(${rx}px,${ry}px)`;
      requestAnimationFrame(loop);
    })();
    $$('a,button,.g-item,.card,.plato').forEach(el => {
      el.addEventListener('mouseenter', () => ring.classList.add('hover'));
      el.addEventListener('mouseleave', () => ring.classList.remove('hover'));
    });
  }
})();