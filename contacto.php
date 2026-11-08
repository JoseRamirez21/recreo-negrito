<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Contacto | Cómo llegar a Recreo El Negrito, Luricocha';
$pageDesc  = 'Escríbenos por WhatsApp, llama al ' . PHONE_TXT . ' o ven a visitarnos en Luricocha, a 10 minutos de Huanta. Mapa, horario y cómo llegar.';
$active    = 'contacto';
$extraJs   = ['contacto.js'];
include __DIR__ . '/includes/header.php';
?>

<!-- ================= HERO INTERIOR ================= -->
<section class="page-hero">
  <div class="hero-bg" data-parallax style="background-image:url('<?= img('contacto-hero.jpg', 'Banner · contacto-hero.jpg') ?>')"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <p class="crumbs reveal"><a href="<?= BASE_URL ?>/index.php">Inicio</a> / Contacto</p>
    <h1 class="reveal" style="--delay:.1s">Hablemos, te <em>esperamos</em></h1>
    <p class="reveal" style="--delay:.2s">Escríbenos, llámanos o ven a visitarnos. Estamos a solo 10 minutos de Huanta.</p>
  </div>
</section>

<!-- ================= DATOS DE CONTACTO ================= -->
<section style="padding-top:80px">
  <div class="container">
    <div class="info-grid">
      <article class="card info reveal">
        <div class="ico">💬</div>
        <h3>WhatsApp</h3>
        <p><a href="<?= wa_link() ?>" target="_blank" rel="noopener"><?= PHONE_TXT ?></a></p>
        <p>Reservas y consultas</p>
      </article>
      <article class="card info reveal" style="--delay:.1s">
        <div class="ico">📞</div>
        <h3>Teléfono</h3>
        <p><a href="tel:+<?= WHATSAPP ?>"><?= PHONE_TXT ?></a></p>
        <p>Llámanos en horario de atención</p>
      </article>
      <article class="card info reveal" style="--delay:.2s">
        <div class="ico">📍</div>
        <h3>Ubicación</h3>
        <p><?= ADDRESS ?></p>
      </article>
      <article class="card info reveal" style="--delay:.3s">
        <div class="ico">🕐</div>
        <h3>Horario</h3>
        <p>Miércoles a lunes<br><?= HORA_ABRE ?>:00 am – <?= HORA_CIERRA - 12 ?>:00 pm</p>
        <p>Martes: descanso<br>Hospedaje: 24 horas</p>
      </article>
    </div>
  </div>
</section>

<!-- ================= MAPA ================= -->
<section class="bg-alt">
  <div class="container loc-grid">
    <div class="reveal from-left">
      <span class="eyebrow">Cómo llegar</span>
      <h2>Más cerca de lo que <em>imaginas</em></h2>
      <p class="muted">Estamos en Luricocha, a unos 10 minutos de la plaza central de Huanta y a un par de cuadras de la Municipalidad de Luricocha.</p>
      <div class="hero-actions" style="margin-top:26px">
        <a href="<?= WAZE ?>" target="_blank" rel="noopener" class="btn btn-primary btn-sm">Abrir en Waze</a>
        <a href="<?= GMAPS ?>" target="_blank" rel="noopener" class="btn btn-ghost btn-sm">Google Maps</a>
      </div>
      <div class="social-row">
        <a href="<?= FACEBOOK ?>" target="_blank" rel="noopener" class="btn btn-ghost btn-sm">Facebook</a>
        <a href="<?= TIKTOK ?>" target="_blank" rel="noopener" class="btn btn-ghost btn-sm">TikTok</a>
      </div>
    </div>
    <div class="map big reveal from-right">
      <iframe src="<?= MAPS_EMBED ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Ubicación de Recreo El Negrito"></iframe>
    </div>
  </div>
</section>

<!-- ================= MENSAJE RÁPIDO ================= -->
<section id="mensaje">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Escríbenos</span>
      <h2>Envíanos un <em>mensaje</em></h2>
      <div class="divider"></div>
      <p>Escribe tu consulta y te llevamos a WhatsApp con el texto listo.</p>
    </div>

    <div class="arm-panel panel-center reveal" id="contactoForm" data-wa="<?= WHATSAPP ?>">
      <div class="arm-group">
        <div class="form-row">
          <div>
            <label class="arm-label" for="cNombre">Tu nombre</label>
            <input type="text" id="cNombre" class="arm-input" placeholder="¿Cómo te llamas?" maxlength="60">
          </div>
          <div>
            <label class="arm-label" for="cAsunto">Asunto</label>
            <select id="cAsunto" class="arm-input">
              <option>Consulta general</option>
              <option>Reserva de mesa</option>
              <option>Hospedaje</option>
              <option>Eventos y cotizaciones</option>
              <option>Sugerencia o reclamo</option>
            </select>
          </div>
        </div>
      </div>
      <div class="arm-group">
        <label class="arm-label" for="cMensaje">Mensaje</label>
        <textarea id="cMensaje" class="arm-input" rows="5" maxlength="500" placeholder="Cuéntanos en qué podemos ayudarte…"></textarea>
        <p class="arm-warn" id="cError">Escribe tu mensaje antes de enviar.</p>
      </div>
      <button type="button" class="btn btn-primary" id="cEnviar">Enviar por WhatsApp</button>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
