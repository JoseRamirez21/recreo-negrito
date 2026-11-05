(() => {
  'use strict';
  const $  = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  /* ---------- Filtros de la carta ---------- */
  const btns  = $$('.filters button');
  const items = $$('.plato[data-cat]');

  function aplicar(cat) {
    let n = 0;
    items.forEach(it => {
      const ok = cat === 'all' || it.dataset.cat === cat;
      it.classList.remove('pop');
      if (ok) {
        it.classList.remove('gone');
        it.style.setProperty('--delay', (n++ * 0.07) + 's');
        void it.offsetWidth;            // reinicia la animación
        it.classList.add('pop');
      } else {
        it.classList.add('gone');
      }
    });
  }
  btns.forEach(b => b.addEventListener('click', () => {
    btns.forEach(x => x.classList.remove('on'));
    b.classList.add('on');
    aplicar(b.dataset.filter);
  }));
  if (items.length) aplicar('all');

  /* ---------- Armador de parrillada ---------- */
  const arm = $('#armador');
  if (!arm) return;

  const outPersonas = $('#personas');
  const totalEl     = $('#total');
  const lista       = $('#resumen');
  const waBtn       = $('#enviarWa');
  const fecha       = $('#fecha');
  const aviso       = $('#avisoMartes');
  const wa          = arm.dataset.wa;

  let personas = 4, mostrado = 0, raf;
  const fmt = n => 'S/ ' + n.toFixed(2);

  // No permitir fechas pasadas
  const hoy = new Date();
  fecha.min = `${hoy.getFullYear()}-${String(hoy.getMonth() + 1).padStart(2, '0')}-${String(hoy.getDate()).padStart(2, '0')}`;

  function animarTotal(destino) {
    cancelAnimationFrame(raf);
    const ini = mostrado, t0 = performance.now(), dur = 500;
    (function paso(t) {
      const p = Math.min((t - t0) / dur, 1);
      mostrado = ini + (destino - ini) * (1 - Math.pow(1 - p, 3));
      totalEl.textContent = fmt(mostrado);
      if (p < 1) raf = requestAnimationFrame(paso);
    })(t0);
  }

  function calcular() {
    const tipo   = $('input[name=tipo]:checked', arm);
    const extras = $$('input[name=extra]:checked', arm);

    const precioTipo = +tipo.dataset.precio;
    const subtotalTipo = precioTipo * personas;

    let total = subtotalTipo;
    let html  = `<li><span>${tipo.dataset.nombre} × ${personas}</span><span>${fmt(subtotalTipo)}</span></li>`;
    const nombresExtras = [];

    extras.forEach(e => {
      const sub = (+e.dataset.precio) * personas;
      total += sub;
      nombresExtras.push(e.dataset.nombre);
      html += `<li><span>${e.dataset.nombre} × ${personas}</span><span>${fmt(sub)}</span></li>`;
    });

    outPersonas.textContent = personas;
    lista.innerHTML = html;
    animarTotal(total);

    // Mensaje de WhatsApp
    let msg = `Hola, quisiera reservar en Recreo El Negrito.\n` +
              `• Personas: ${personas}\n` +
              `• Parrilla: ${tipo.dataset.nombre}\n`;
    if (nombresExtras.length) msg += `• Extras: ${nombresExtras.join(', ')}\n`;
    if (fecha.value) {
      const [y, m, d] = fecha.value.split('-');
      msg += `• Fecha: ${d}/${m}/${y}\n`;
    }
    msg += `• Estimado: ${fmt(total)}\n¿Tienen disponibilidad?`;
    waBtn.href = `https://wa.me/${wa}?text=${encodeURIComponent(msg)}`;
  }

  $('#mas').addEventListener('click',  () => { if (personas < 60) { personas++; calcular(); } });
  $('#menos').addEventListener('click', () => { if (personas > 1)  { personas--; calcular(); } });
  $$('input[name=tipo], input[name=extra]', arm).forEach(i => i.addEventListener('change', calcular));

  fecha.addEventListener('change', () => {
    if (fecha.value) {
      const dia = new Date(fecha.value + 'T00:00').getDay();   // 2 = martes
      aviso.classList.toggle('show', dia === 2);
    } else {
      aviso.classList.remove('show');
    }
    calcular();
  });

  calcular();
})();