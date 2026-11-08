<?php
$pageTitle = 'Reservas | Mesa, hospedaje y eventos en Recreo El Negrito';
$pageDesc  = 'Reserva tu mesa, hospedaje, día de recreo o evento en Recreo El Negrito, Luricocha. Se confirma por WhatsApp.';
$active    = 'reservas';
$extraJs   = ['reservas.js'];
include __DIR__ . '/includes/header.php';

$tipos = [
    ['mesa',      '🔥', 'Mesa / parrillada'],
    ['dia',       '🏊', 'Día de recreo (piscina)'],
    ['hospedaje', '🛏️', 'Hospedaje'],
    ['evento',    '🎉', 'Evento'],
];
?>

<!-- ================= HERO INTERIOR ================= -->
<section class="page-hero">
  <div class="hero-bg" data-parallax style="background-image:url('<?= img('reservas-hero.jpg', 'Banner · reservas-hero.jpg') ?>')"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <p class="crumbs reveal"><a href="<?= BASE_URL ?>/index.php">Inicio</a> / Reservas</p>
    <h1 class="reveal" style="--delay:.1s">Reserva tu <em>día</em></h1>
    <p class="reveal" style="--delay:.2s">Completa los datos y te llevamos directo a WhatsApp con el mensaje listo.</p>
  </div>
</section>

<!-- ================= FORMULARIO ================= -->
<section style="padding-top:80px">
  <div class="container">
    <div class="armador" id="reserva"
         data-wa="<?= WHATSAPP ?>"
         data-abre="<?= HORA_ABRE ?>"
         data-cierra="<?= HORA_CIERRA ?>"
         data-cerrado="<?= DIA_CERRADO ?>">

      <div class="arm-panel reveal from-left">
        <div class="arm-group">
          <span class="arm-title">1 · ¿Qué quieres reservar?</span>
          <div class="tipo-chips">
            <?php foreach ($tipos as $i => [$id, $ico, $nom]): ?>
              <label class="opt">
                <input type="radio" name="tipo" value="<?= $id ?>" data-nombre="<?= $nom ?>" <?= $i === 0 ? 'checked' : '' ?>>
                <span><div><?= $ico ?> <?= $nom ?></div></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="arm-group">
          <span class="arm-title">2 · Tus datos</span>
          <label class="arm-label" for="rNombre">Tu nombre</label>
          <input type="text" id="rNombre" class="arm-input" placeholder="¿A nombre de quién?" maxlength="60">
        </div>

        <div class="arm-group">
          <span class="arm-title">3 · Fecha y hora</span>
          <div class="form-row">
            <div>
              <label class="arm-label" for="rFecha" id="lblFecha">Fecha</label>
              <input type="date" id="rFecha" class="arm-input">
            </div>
            <div id="grpHora">
              <label class="arm-label" for="rHora">Hora aproximada (opcional)</label>
              <input type="time" id="rHora" class="arm-input">
            </div>
            <div id="grpSalida" hidden>
              <label class="arm-label" for="rSalida">Fecha de salida</label>
              <input type="date" id="rSalida" class="arm-input">
            </div>
          </div>
          <p class="arm-warn" id="rAviso">Los martes no atendemos. Elige otro día, por favor.</p>
        </div>

        <div class="arm-group">
          <span class="arm-title" id="lblPers">4 · Personas</span>
          <div class="stepper">
            <button type="button" id="rMenos" aria-label="Menos">−</button>
            <output id="rPersonas">4</output>
            <button type="button" id="rMas" aria-label="Más">+</button>
          </div>
        </div>

        <div class="arm-group">
          <span class="arm-title">5 · Comentarios (opcional)</span>
          <textarea id="rComent" class="arm-input" rows="3" maxlength="300" placeholder="Ej.: es un cumpleaños, necesitamos sillas para niños…"></textarea>
        </div>
      </div>

      <aside class="arm-panel arm-total reveal from-right">
        <span class="arm-title">Vista previa de tu mensaje</span>
        <div class="wa-preview" id="rPreview"></div>
        <p class="arm-warn" id="rErrores" style="white-space:pre-line;margin-bottom:14px"></p>
        <button type="button" class="btn btn-primary" id="rEnviar">Enviar por WhatsApp</button>
        <ul class="arm-note-list">
          <li>✓ Tu reserva se confirma cuando te respondemos por WhatsApp.</li>
          <li>✓ Atendemos de miércoles a lunes. Los martes descansamos.</li>
          <li>✓ ¿Prefieres llamar? <a href="tel:+<?= WHATSAPP ?>" style="color:var(--oro)"><?= PHONE_TXT ?></a></li>
        </ul>
      </aside>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>