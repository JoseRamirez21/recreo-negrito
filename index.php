<?php
$pageTitle = 'Recreo El Negrito | Parrilladas, piscinas y hospedaje en Luricocha, Huanta';
$pageDesc  = 'A 10 minutos de Huanta: parrilladas, piscinas, áreas verdes, salón de eventos y hospedaje. Reserva por WhatsApp.';
$active    = 'index';
include __DIR__ . '/includes/header.php';

/* ===== DATOS EDITABLES (cámbialos por los reales) ===== */
$servicios = [
    ['🔥', 'Parrilladas',      'Carnes a la parrilla y parrilladas mixtas preparadas al momento, con sabor a leña.'],
    ['🏊', 'Piscinas',         'Piscinas para niños y adultos para que todos disfruten del día.'],
    ['🌿', 'Áreas verdes',     'Amplios jardines y ambiente campestre para desconectarte de la ciudad.'],
    ['🎠', 'Zona de niños',    'Espacio de juegos seguro para que los más pequeños se diviertan.'],
    ['🎉', 'Salón de eventos', 'Cumpleaños, aniversarios, reuniones y celebraciones en nuestro salón principal.'],
    ['🛏️', 'Hospedaje',        'Habitaciones con terraza y comedor, disponibles las 24 horas.'],
];

// Ejemplos: REEMPLAZAR por la carta real (precio null = "Consultar")
$platos = [
    ['Parrillada mixta',  'carta/parrillada.jpg', 'Selección de carnes a la brasa para compartir.', null],
    ['Chuleta a la parrilla','carta/chuleta.jpg',  'Jugosa, con papas y ensalada fresca.',          null],
    ['Anticuchos',        'carta/anticuchos.jpg', 'Clásico sabor de brasa con ají de la casa.',     null],
    ['Pollo a la parrilla','carta/pollo.jpg',     'Dorado al carbón, acompañado de guarniciones.',  null],
];

// EJEMPLOS: REEMPLAZAR por reseñas reales de Google / Facebook
$testimonios = [
    ['Excelente atención y un ambiente ideal para ir en familia. Las parrilladas, buenísimas.', 'Cliente de Huanta'],
    ['Fuimos a celebrar un cumpleaños y todo salió perfecto. Volveremos pronto.',               'Cliente de Ayacucho'],
    ['Un lugar tranquilo para descansar del ritmo de la ciudad. Muy recomendado.',              'Visitante'],
];
?>

<!-- ================= HERO ================= -->
<section class="hero" id="inicio">
  <div class="hero-bg" data-parallax style="background-image:url('<?= img('hero.jpg', 'Foto principal · hero.jpg') ?>')"></div>
  <div class="hero-overlay"></div>
  <div class="embers" aria-hidden="true"></div>

  <div class="container hero-content">
    <span class="badge-status <?= $estado['abierto'] ? 'on' : 'off' ?> reveal"><i></i><?= $estado['texto'] ?></span>
    <span class="eyebrow reveal" style="--delay:.1s">Luricocha · Huanta · Ayacucho</span>
    <h1 class="reveal" style="--delay:.2s">Sabor a <em>leña</em>,<br>aire de <em>campo</em></h1>
    <p class="lead reveal" style="--delay:.35s">Parrilladas, piscinas y naturaleza a solo 10 minutos de la plaza de Huanta. El plan perfecto para toda la familia.</p>
    <div class="hero-actions reveal" style="--delay:.5s">
      <a href="<?= wa_link('Hola, quisiera reservar en Recreo El Negrito.') ?>" target="_blank" rel="noopener" class="btn btn-primary">Reservar por WhatsApp</a>
      <a href="<?= BASE_URL ?>/carta.php" class="btn btn-ghost">Ver la carta</a>
    </div>
  </div>
  <a class="scroll-down" href="#nosotros" aria-label="Bajar"><span></span></a>
</section>

<!-- ================= MARQUEE ================= -->
<div class="marquee" aria-hidden="true">
  <div class="marquee-track">
    <?php for ($k = 0; $k < 2; $k++): foreach (['Parrilladas','Piscinas','Hospedaje','Eventos','Áreas verdes','Zona de niños'] as $t): ?>
      <span><?= $t ?></span>
    <?php endforeach; endfor; ?>
  </div>
</div>

<!-- ================= NOSOTROS ================= -->
<section id="nosotros">
  <div class="container">
    <div class="about-grid">
      <div class="about-img reveal from-left">
        <img src="<?= img('nosotros.jpg', 'Foto del recreo · nosotros.jpg') ?>" alt="Recreo El Negrito" loading="lazy">
      </div>
      <div class="about-text reveal from-right">
        <span class="eyebrow">Nuestra casa</span>
        <h2>Un rincón de <em>Luricocha</em> para disfrutar</h2>
        <div class="divider" style="margin-left:0"></div>
        <p>El Club Recreo Parrilladas El Negrito es un centro campestre conocido por su sabor, su ambiente familiar y su cercanía: a pocos minutos de Huanta, rodeado de áreas verdes.</p>
        <p>Ven a disfrutar de carnes a la parrilla, piscinas, juegos para niños y un salón para tus celebraciones. Y si quieres quedarte, tenemos habitaciones con terraza.</p>
        <a href="<?= BASE_URL ?>/nosotros.php" class="btn btn-ghost">Conócenos más</a>
      </div>
    </div>

    <div class="counters">
      <div class="counter reveal"><strong data-count="10">0</strong><span>MINUTOS DESDE HUANTA</span></div>
      <div class="counter reveal" style="--delay:.1s"><strong data-count="24">0</strong><span>HORAS DE HOSPEDAJE</span></div>
      <div class="counter reveal" style="--delay:.2s"><strong data-count="6">0</strong><span>DÍAS ABIERTOS A LA SEMANA</span></div>
      <div class="counter reveal" style="--delay:.3s"><strong data-count="60">0</strong><span>SOLES · HABITACIÓN DESDE</span></div>
    </div>
  </div>
</section>

<!-- ================= SERVICIOS ================= -->
<section class="bg-alt" id="servicios">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Lo que ofrecemos</span>
      <h2>Todo para un día <em>inolvidable</em></h2>
      <div class="divider"></div>
      <p>Comida, diversión y descanso en un solo lugar.</p>
    </div>
    <div class="cards">
      <?php foreach ($servicios as $n => [$ico, $tit, $desc]): ?>
        <article class="card reveal" style="--delay:<?= ($n % 3) * 0.12 ?>s">
          <div class="ico"><?= $ico ?></div>
          <h3><?= $tit ?></h3>
          <p><?= $desc ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= PLATOS DESTACADOS ================= -->
<section id="carta-destacada">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">De la brasa a tu mesa</span>
      <h2>Nuestros <em>favoritos</em></h2>
      <div class="divider"></div>
      <p>Consumo promedio de S/ 20 a S/ 40 por persona.</p>
    </div>
    <div class="platos">
      <?php foreach ($platos as $n => [$nom, $foto, $desc, $precio]): ?>
        <article class="plato reveal" style="--delay:<?= $n * 0.1 ?>s">
          <div class="plato-img"><img src="<?= img($foto, $nom) ?>" alt="<?= $nom ?>" loading="lazy"></div>
          <div class="plato-body">
            <h3><?= $nom ?></h3>
            <p><?= $desc ?></p>
            <span class="precio"><?= $precio ? 'S/ ' . number_format($precio, 2) : 'Consultar precio' ?></span>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
    <div style="text-align:center;margin-top:50px" class="reveal">
      <a href="<?= BASE_URL ?>/carta.php" class="btn btn-primary">Ver carta completa</a>
    </div>
  </div>
</section>

<!-- ================= GALERÍA ================= -->
<section class="bg-alt" id="galeria">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Momentos</span>
      <h2>Vive el <em>ambiente</em></h2>
      <div class="divider"></div>
    </div>
    <div class="gallery">
      <?php for ($g = 1; $g <= 6; $g++): ?>
        <a class="g-item reveal" style="--delay:<?= $g * 0.07 ?>s" href="<?= BASE_URL ?>/galeria.php">
          <img src="<?= img("galeria/foto-$g.jpg", "Galería · foto-$g.jpg") ?>" alt="Recreo El Negrito, foto <?= $g ?>" loading="lazy">
        </a>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- ================= TESTIMONIOS ================= -->
<section id="testimonios">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Opiniones</span>
      <h2>Lo que dicen <em>nuestros clientes</em></h2>
      <div class="divider"></div>
    </div>
    <div class="testi reveal">
      <div class="t-track">
        <?php foreach ($testimonios as [$txt, $autor]): ?>
          <div class="t-slide">
            <div class="stars">★★★★★</div>
            <blockquote>“<?= $txt ?>”</blockquote>
            <cite>— <?= $autor ?></cite>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="t-dots"></div>
    </div>
  </div>
</section>

<!-- ================= CTA ================= -->
<section class="cta">
  <div class="cta-bg" style="background-image:url('<?= img('cta.jpg', 'Foto de fondo · cta.jpg') ?>')"></div>
  <div class="container reveal">
    <span class="eyebrow">Reserva tu día</span>
    <h2>¿Listo para una experiencia <em>diferente</em>?</h2>
    <p>Escríbenos por WhatsApp y reserva tu mesa, tu habitación o tu evento.</p>
    <a href="<?= wa_link('Hola, quisiera reservar en Recreo El Negrito.') ?>" target="_blank" rel="noopener" class="btn btn-primary">Escribir por WhatsApp · <?= PHONE_TXT ?></a>
  </div>
</section>

<!-- ================= UBICACIÓN ================= -->
<section id="ubicacion">
  <div class="container loc-grid">
    <div class="reveal from-left">
      <span class="eyebrow">Cómo llegar</span>
      <h2>A solo <em>10 minutos</em> de Huanta</h2>
      <ul class="loc-list">
        <li><strong>Dirección</strong><?= ADDRESS ?></li>
        <li><strong>Horario</strong>Miércoles a lunes · <?= HORA_ABRE ?>:00 am – <?= HORA_CIERRA - 12 ?>:00 pm (martes descanso)</li>
        <li><strong>Reservas</strong><?= PHONE_TXT ?> (llamadas y WhatsApp)</li>
      </ul>
      <div class="hero-actions" style="margin-top:28px">
        <a href="<?= WAZE ?>" target="_blank" rel="noopener" class="btn btn-primary btn-sm">Abrir en Waze</a>
        <a href="<?= GMAPS ?>" target="_blank" rel="noopener" class="btn btn-ghost btn-sm">Google Maps</a>
      </div>
    </div>
    <div class="map reveal from-right">
      <iframe src="<?= MAPS_EMBED ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Ubicación de Recreo El Negrito"></iframe>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>