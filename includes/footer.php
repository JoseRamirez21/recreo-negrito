<footer class="footer">
  <div class="container footer-grid">
    <div>
      <h3 class="footer-brand">El Negrito</h3>
      <p>Parrilladas, naturaleza y descanso a 10 minutos de la plaza de Huanta.</p>
      <div class="social">
        <a href="<?= FACEBOOK ?>" target="_blank" rel="noopener">Facebook</a>
        <a href="<?= TIKTOK ?>" target="_blank" rel="noopener">TikTok</a>
      </div>
    </div>
    <div>
      <h4>Explora</h4>
      <ul>
        <li><a href="<?= BASE_URL ?>/carta.php">Carta</a></li>
        <li><a href="<?= BASE_URL ?>/instalaciones.php">Instalaciones</a></li>
        <li><a href="<?= BASE_URL ?>/hospedaje.php">Hospedaje</a></li>
        <li><a href="<?= BASE_URL ?>/eventos.php">Eventos</a></li>
        <li><a href="<?= BASE_URL ?>/reservas.php">Reservas</a></li>
      </ul>
    </div>
    <div>
      <h4>Horario</h4>
      <ul>
        <li>Miércoles a Lunes</li>
        <li><?= HORA_ABRE ?>:00 am – <?= HORA_CIERRA - 12 ?>:00 pm</li>
        <li class="muted">Martes: descanso</li>
        <li class="muted">Hospedaje: 24 horas</li>
      </ul>
    </div>
    <div>
      <h4>Contacto</h4>
      <ul>
        <li><a href="<?= wa_link() ?>" target="_blank" rel="noopener">WhatsApp <?= PHONE_TXT ?></a></li>
        <li><?= ADDRESS ?></li>
        <li><a href="<?= WAZE ?>" target="_blank" rel="noopener">Cómo llegar (Waze)</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">© <?= date('Y') ?> Club Recreo Parrilladas El Negrito de Luricocha. Todos los derechos reservados.</div>
  </div>
</footer>

<!-- WhatsApp flotante -->
<a class="wa-float" href="<?= wa_link('Hola, quisiera reservar en Recreo El Negrito.') ?>" target="_blank" rel="noopener" aria-label="Escríbenos por WhatsApp">
  <svg viewBox="0 0 24 24" width="30" height="30" fill="#fff"><path d="M20.52 3.48A11.86 11.86 0 0 0 12.04 0C5.5 0 .2 5.3.2 11.84c0 2.09.55 4.13 1.59 5.93L0 24l6.4-1.68a11.8 11.8 0 0 0 5.64 1.44h.01c6.53 0 11.84-5.3 11.84-11.84 0-3.16-1.23-6.13-3.37-8.44zM12.05 21.8h-.01a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.8 1 1.01-3.7-.24-.38a9.87 9.87 0 0 1-1.51-5.27c0-5.45 4.44-9.89 9.9-9.89 2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 0 1 2.89 7c0 5.46-4.44 9.9-9.89 9.9zm5.43-7.4c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.14-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.06 2.87 1.21 3.07.15.2 2.09 3.19 5.06 4.47.71.31 1.26.49 1.69.63.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.41.25-.69.25-1.29.17-1.41-.07-.12-.27-.2-.57-.35z"/></svg>
</a>

<script src="<?= asset('js/main.js') ?>"></script>
<?php foreach (($extraJs ?? []) as $js): ?>
<script src="<?= asset('js/' . $js) ?>"></script>
<?php endforeach; ?>
</body>
</html>