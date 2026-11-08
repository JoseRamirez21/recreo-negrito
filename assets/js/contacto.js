(() => {
  'use strict';
  const root = document.getElementById('contactoForm');
  if (!root) return;

  const $ = s => root.querySelector(s);
  const wa      = root.dataset.wa;
  const nombre  = $('#cNombre');
  const asunto  = $('#cAsunto');
  const mensaje = $('#cMensaje');
  const error   = $('#cError');

  mensaje.addEventListener('input', () => error.classList.remove('show'));

  $('#cEnviar').addEventListener('click', () => {
    if (!mensaje.value.trim()) {
      error.classList.add('show');
      mensaje.focus();
      return;
    }
    let txt = `Hola, les escribo desde la web de Recreo El Negrito.\n• Asunto: ${asunto.value}\n`;
    if (nombre.value.trim()) txt += `• Nombre: ${nombre.value.trim()}\n`;
    txt += `\n${mensaje.value.trim()}`;
    window.open(`https://wa.me/${wa}?text=${encodeURIComponent(txt)}`, '_blank', 'noopener');
  });
})();