(() => {
  'use strict';
  const root = document.getElementById('evento');
  if (!root) return;

  const $  = s => root.querySelector(s);
  const $$ = s => [...root.querySelectorAll(s)];
  const wa = root.dataset.wa;

  const tipoEl   = $('#tipoEvento');
  const outInv   = $('#invitados');
  const totalEl  = $('#totalEv');
  const lista    = $('#resumenEv');
  const btn      = $('#enviarEv');
  const fecha    = $('#fechaEv');
  const nombre   = $('#nombreEv');
  const aviso    = $('#avisoMartesEv');

  const MIN = 10, MAX = 500, PASO = 5;
  let invitados = 30, mostrado = 0, raf;

  const fmt = n => 'S/ ' + n.toFixed(2);
  const dmy = v => { const [y, m, d] = v.split('-'); return `${d}/${m}/${y}`; };
  const precioDe = el => (el.dataset.precio === '' ? null : +el.dataset.precio);

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
    const serv   = $('input[name=servicio]:checked');
    const extras = $$('input[name=extra]:checked');

    let total = 0;
    let html  = '<li><span>Alquiler de salón</span><span>A cotizar</span></li>';
    const conPrecio = [], aCotizar = [];

    const pServ = precioDe(serv) || 0;
    if (pServ > 0) {
      const sub = pServ * invitados;
      total += sub;
      html += `<li><span>${serv.dataset.nombre} × ${invitados}</span><span>${fmt(sub)}</span></li>`;
    } else {
      html += `<li><span>${serv.dataset.nombre}</span><span>—</span></li>`;
    }

    extras.forEach(e => {
      const p = precioDe(e);
      if (p === null) {
        aCotizar.push(e.dataset.nombre);
        html += `<li><span>${e.dataset.nombre}</span><span>A cotizar</span></li>`;
      } else {
        const sub = p * invitados;
        total += sub;
        conPrecio.push(e.dataset.nombre);
        html += `<li><span>${e.dataset.nombre} × ${invitados}</span><span>${fmt(sub)}</span></li>`;
      }
    });

    outInv.textContent = invitados;
    lista.innerHTML = html;
    animarTotal(total);

    // Mensaje de WhatsApp
    let msg = 'Hola, quisiera cotizar un evento en Recreo El Negrito.\n';
    if (nombre.value.trim()) msg += `• A nombre de: ${nombre.value.trim()}\n`;
    msg += `• Evento: ${tipoEl.value}\n• Invitados: ${invitados}\n• Comida: ${serv.dataset.nombre}\n`;
    if (conPrecio.length) msg += `• Extras: ${conPrecio.join(', ')}\n`;
    if (aCotizar.length)  msg += `• También quiero cotizar: ${aCotizar.join(', ')}\n`;
    if (fecha.value)      msg += `• Fecha: ${dmy(fecha.value)}\n`;
    msg += `• Estimado de comida y bebidas: ${fmt(total)}\n¿Tienen disponibilidad y cuál sería el costo del salón?`;
    btn.href = `https://wa.me/${wa}?text=${encodeURIComponent(msg)}`;
  }

  $('#masInv').addEventListener('click',   () => { if (invitados < MAX) { invitados = Math.min(MAX, invitados + PASO); calcular(); } });
  $('#menosInv').addEventListener('click', () => { if (invitados > MIN) { invitados = Math.max(MIN, invitados - PASO); calcular(); } });
  tipoEl.addEventListener('change', calcular);
  nombre.addEventListener('input', calcular);
  $$('input[name=servicio], input[name=extra]').forEach(i => i.addEventListener('change', calcular));

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