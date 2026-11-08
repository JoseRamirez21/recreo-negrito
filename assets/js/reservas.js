(() => {
  'use strict';
  const root = document.getElementById('reserva');
  if (!root) return;

  const $  = s => root.querySelector(s);
  const $$ = s => [...root.querySelectorAll(s)];

  const wa      = root.dataset.wa;
  const abre    = +root.dataset.abre;
  const cierra  = +root.dataset.cierra;
  const cerrado = (+root.dataset.cerrado) % 7;      // PHP 1..7 → JS getDay (0 = domingo)

  const nombre  = $('#rNombre'),  fecha   = $('#rFecha'),  hora   = $('#rHora');
  const salida  = $('#rSalida'),  coment  = $('#rComent'), outP   = $('#rPersonas');
  const grpHora = $('#grpHora'),  grpSal  = $('#grpSalida');
  const lblFecha= $('#lblFecha'), lblPers = $('#lblPers');
  const aviso   = $('#rAviso'),   prev    = $('#rPreview'), err = $('#rErrores');
  const btn     = $('#rEnviar');

  const DAY = 864e5;
  const pad = n => String(n).padStart(2, '0');
  const iso = d => `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}`;
  const parse = v => new Date(v + 'T00:00');
  const dmy = v => { const [y, m, d] = v.split('-'); return `${d}/${m}/${y}`; };
  const esCerrado = v => v && parse(v).getDay() === cerrado;

  let personas = 4;
  const hoy = new Date();
  fecha.min  = iso(hoy);
  salida.min = iso(new Date(hoy.getTime() + DAY));
  hora.min = `${pad(abre)}:00`;
  hora.max = `${pad(cierra)}:00`;

  const tipo = () => $('input[name=tipo]:checked');
  const esHosp = () => tipo().value === 'hospedaje';

  function ajustarTipo() {
    const h = esHosp();
    grpHora.hidden = h;
    grpSal.hidden  = !h;
    lblFecha.textContent = h ? 'Fecha de llegada' : 'Fecha';
    lblPers.textContent  = h ? '4 · Huéspedes' : '4 · Personas';
  }

  function mensaje() {
    const h = esHosp();
    let m = `Hola, quisiera hacer una reserva en Recreo El Negrito.\n• Reserva: ${tipo().dataset.nombre}\n`;
    if (nombre.value.trim()) m += `• A nombre de: ${nombre.value.trim()}\n`;
    if (h) {
      if (fecha.value)  m += `• Llegada: ${dmy(fecha.value)}\n`;
      if (salida.value) {
        m += `• Salida: ${dmy(salida.value)}\n`;
        const n = Math.round((parse(salida.value) - parse(fecha.value)) / DAY);
        if (fecha.value && n > 0) m += `• Noches: ${n}\n`;
      }
      m += `• Huéspedes: ${personas}\n`;
    } else {
      if (fecha.value) m += `• Fecha: ${dmy(fecha.value)}\n`;
      if (hora.value)  m += `• Hora aprox.: ${hora.value}\n`;
      m += `• Personas: ${personas}\n`;
    }
    if (coment.value.trim()) m += `• Comentarios: ${coment.value.trim()}\n`;
    m += '¿Tienen disponibilidad?';
    return m;
  }

  function validar() {
    const e = [];
    if (!nombre.value.trim()) e.push('• Escribe tu nombre.');
    if (!fecha.value) e.push('• Elige una fecha.');
    else if (esCerrado(fecha.value)) e.push('• Los martes no atendemos: elige otro día.');

    if (esHosp()) {
      if (!salida.value) e.push('• Elige la fecha de salida.');
      else if (fecha.value && parse(salida.value) <= parse(fecha.value)) e.push('• La salida debe ser después de la llegada.');
    } else if (hora.value) {
      const [hh] = hora.value.split(':').map(Number);
      if (hh < abre || hh >= cierra) e.push(`• Atendemos de ${abre}:00 a ${cierra}:00. Elige una hora dentro de ese horario.`);
    }
    return e;
  }

  function refrescar() {
    outP.textContent = personas;
    aviso.classList.toggle('show', esCerrado(fecha.value));
    prev.textContent = mensaje();
  }

  /* Eventos */
  $$('input[name=tipo]').forEach(i => i.addEventListener('change', () => { ajustarTipo(); refrescar(); }));
  fecha.addEventListener('change', () => {
    if (fecha.value) salida.min = iso(new Date(parse(fecha.value).getTime() + DAY));
    refrescar();
  });
  [salida, hora].forEach(el => el.addEventListener('change', refrescar));
  [nombre, coment].forEach(el => el.addEventListener('input', refrescar));
  $('#rMas').addEventListener('click',   () => { if (personas < 200) { personas++; refrescar(); } });
  $('#rMenos').addEventListener('click', () => { if (personas > 1)   { personas--; refrescar(); } });

  btn.addEventListener('click', () => {
    const e = validar();
    if (e.length) {
      err.textContent = e.join('\n');
      err.classList.add('show');
      return;
    }
    err.classList.remove('show');
    const url = `https://wa.me/${wa}?text=${encodeURIComponent(mensaje())}`;
    window.open(url, '_blank', 'noopener');
  });

  ajustarTipo();
  refrescar();
})();