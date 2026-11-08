<?php
$pageTitle = 'Hospedaje | Habitaciones con terraza en Luricocha, Huanta · El Negrito';
$pageDesc  = 'Habitaciones desde S/ 60 con terraza y comedor, disponibles las 24 horas. Descansa en el campo a 10 minutos de Huanta.';
$active    = 'hospedaje';
$extraJs   = ['hospedaje.js'];
include __DIR__ . '/includes/header.php';

/* ===== PRECIO BASE (dato real: desde ~S/ 60) ===== */
$precioDesde = 60;

/* ===== COMODIDADES (datos reales) ===== */
$comodidades = [
    ['🕐', 'Atención 24 horas', 'Llega cuando lo necesites: el hospedaje está disponible todo el día.'],
    ['🌄', 'Terraza',           'Disfruta del aire de campo y las vistas desde tu terraza.'],
    ['🍽️', 'Comedor',           'Espacio de comedor para compartir con los tuyos.'],
];

/* ===== HABITACIONES (EJEMPLOS: reemplazar tipos, descripciones y precios reales)
   [nombre, foto, descripción, precio]  → null = "Consultar precio" */
$habitaciones = [
    ['Habitación estándar', 'hospedaje/habitacion-1.jpg', 'Cómoda y tranquila, con acceso a terraza y comedor.', $precioDesde],
    ['Habitación familiar', 'hospedaje/habitacion-2.jpg', 'Más espacio para viajar o descansar en familia.',        null],
    ['Habitación grupal',   'hospedaje/habitacion-3.jpg', 'Pensada para grupos de amigos o reuniones.',           null],
];
?>

<!-- ================= HERO INTERIOR ================= -->
<section class="page-hero">
  <div class="hero-bg" data-parallax style="background-image:url('<?= img('hospedaje-hero.jpg', 'Banner · hospedaje-hero.jpg') ?>')"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <p class="crumbs reveal"><a href="<?= BASE_URL ?>/index.php">Inicio</a> / Hospedaje</p>
    <h1 class="reveal" style="--delay:.1s">Descansa en el <em>campo</em></h1>
    <p class="reveal" style="--delay:.2s">Habitaciones desde S/ <?= $precioDesde ?> con terraza y comedor, disponibles las 24 horas.</p>
  </div>
</section>

<!-- ================= COMODIDADES ================= -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Incluye</span>
      <h2>Comodidad en <em>plena naturaleza</em></h2>
      <div class="divider"></div>
    </div>
    <div class="cards">
      <?php foreach ($comodidades as $n => [$ico, $tit, $desc]): ?>
        <article class="card reveal" style="--delay:<?= $n * 0.12 ?>s">
          <div class="ico"><?= $ico ?></div>
          <h3><?= $tit ?></h3>
          <p><?= $desc ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= HABITACIONES ================= -->
<section class="bg-alt">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Nuestras habitaciones</span>
      <h2>Elige tu <em>habitación</em></h2>
      <div class="divider"></div>
      <p>Precio desde S/ <?= $precioDesde ?> por noche. Confirma disponibilidad y tarifa por WhatsApp.</p>
    </div>
    <div class="platos cols-3">
      <?php foreach ($habitaciones as $n => [$nom, $foto, $desc, $precio]): ?>
        <article class="plato reveal" style="--delay:<?= $n * 0.1 ?>s">
          <div class="plato-img">
            <?php if ($precio): ?><span class="tag">Desde S/ <?= $precio ?></span><?php endif; ?>
            <img src="<?= img($foto, $nom) ?>" alt="<?= htmlspecialchars($nom) ?>" loading="lazy">
          </div>
          <div class="plato-body">
            <h3><?= $nom ?></h3>
            <p><?= $desc ?></p>
            <span class="precio"><?= $precio ? 'S/ ' . number_format($precio, 2) . ' / noche' : 'Consultar precio' ?></span>
            <a class="plato-link" target="_blank" rel="noopener"
               href="<?= wa_link('Hola, quisiera consultar por: ' . $nom) ?>">Consultar →</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= CONSULTA DE DISPONIBILIDAD ================= -->
<section id="disponibilidad">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Reserva tu estadía</span>
      <h2>Consulta <em>disponibilidad</em></h2>
      <div class="divider"></div>
      <p>Elige tus fechas y te respondemos por WhatsApp.</p>
    </div>

    <div class="armador" id="hosp" data-wa="<?= WHATSAPP ?>" data-precio="<?= $precioDesde ?>">
      <div class="arm-panel reveal from-left">
        <div class="arm-group">
          <span class="arm-title">1 · Tus fechas</span>
          <div class="form-row">
            <div>
              <label class="arm-label" for="llegada">Llegada</label>
              <input type="date" id="llegada" class="arm-input">
            </div>
            <div>
              <label class="arm-label" for="salida">Salida</label>
              <input type="date" id="salida" class="arm-input">
            </div>
          </div>
          <p class="arm-warn" id="avisoFechas">La salida debe ser después de la llegada.</p>
        </div>

        <div class="arm-group">
          <span class="arm-title">2 · Huéspedes</span>
          <select id="huespedes" class="arm-input">
            <?php for ($h = 1; $h <= 12; $h++): ?>
              <option value="<?= $h ?>" <?= $h === 2 ? 'selected' : '' ?>><?= $h ?> <?= $h === 1 ? 'persona' : 'personas' ?></option>
            <?php endfor; ?>
          </select>
        </div>

        <div class="arm-group">
          <span class="arm-title">3 · Tu nombre (opcional)</span>
          <input type="text" id="nombre" class="arm-input" placeholder="¿A nombre de quién?" maxlength="60">
        </div>
      </div>

      <aside class="arm-panel arm-total reveal from-right">
        <span class="arm-title">Tu estadía</span>
        <div class="big" id="noches">—</div>
        <p class="muted" style="font-size:.85rem">noches</p>
        <ul>
          <li><span>Tarifa desde</span><span>S/ <?= $precioDesde ?> / noche</span></li>
          <li><span>Estimado desde</span><span id="totalHosp">—</span></li>
        </ul>
        <a id="enviarHosp" class="btn btn-primary" target="_blank" rel="noopener" href="#">Consultar por WhatsApp</a>
        <p class="note">Estimado referencial por habitación. La tarifa final depende del tipo de habitación y se confirma por WhatsApp.</p>
      </aside>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>