(() => {
  'use strict';
  const $  = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  const btns  = $$('.filters button');
  const items = $$('.gal-item');
  const lb    = $('#lb');
  const lbImg = $('#lbImg');
  const lbCap = $('#lbCap');
  const lbCnt = $('#lbCount');

  let visibles = [], idx = 0;

  /* ---------- Filtros ---------- */
  function aplicar(cat) {
    let n = 0;
    items.forEach(it => {
      const ok = cat === 'all' || it.dataset.cat === cat;
      it.classList.remove('pop');
      if (ok) {
        it.classList.remove('gone');
        it.style.setProperty('--delay', (n++ * 0.06) + 's');
        void it.offsetWidth;             // reinicia la animación
        it.classList.add('pop');
      } else {
        it.classList.add('gone');
      }
    });
    visibles = items.filter(i => !i.classList.contains('gone'));
  }
  btns.forEach(b => b.addEventListener('click', () => {
    btns.forEach(x => x.classList.remove('on'));
    b.classList.add('on');
    aplicar(b.dataset.filter);
  }));
  aplicar('all');

  /* ---------- Lightbox ---------- */
  function mostrar() {
    const it  = visibles[idx];
    const src = $('img', it).getAttribute('src');
    lbImg.style.opacity = 0;
    if (lbImg.getAttribute('src') === src) {
      lbImg.style.opacity = 1;
    } else {
      lbImg.onload = () => { lbImg.style.opacity = 1; };
      lbImg.src = src;
    }
    lbImg.alt = it.dataset.cap;
    lbCap.textContent = it.dataset.cap;
    lbCnt.textContent = `${it.dataset.catname.toUpperCase()} · ${idx + 1} / ${visibles.length}`;
  }
  function abrir(i) {
    idx = i;
    mostrar();
    lb.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function cerrar() {
    lb.classList.remove('open');
    document.body.style.overflow = '';
  }
  function mover(d) {
    idx = (idx + d + visibles.length) % visibles.length;
    mostrar();
  }

  items.forEach(it => it.addEventListener('click', () => abrir(visibles.indexOf(it))));
  $('#lbClose').addEventListener('click', cerrar);
  $('#lbPrev').addEventListener('click', () => mover(-1));
  $('#lbNext').addEventListener('click', () => mover(1));
  lb.addEventListener('click', e => { if (e.target === lb) cerrar(); });

  document.addEventListener('keydown', e => {
    if (!lb.classList.contains('open')) return;
    if (e.key === 'Escape')     cerrar();
    if (e.key === 'ArrowLeft')  mover(-1);
    if (e.key === 'ArrowRight') mover(1);
  });

  // Deslizar en celular
  let x0 = 0;
  lb.addEventListener('touchstart', e => { x0 = e.touches[0].clientX; }, { passive: true });
  lb.addEventListener('touchend', e => {
    const dx = e.changedTouches[0].clientX - x0;
    if (Math.abs(dx) > 50) mover(dx < 0 ? 1 : -1);
  });
})();