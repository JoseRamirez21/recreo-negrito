<?php
$pageTitle = 'Nosotros | Recreo El Negrito, Luricocha';
$pageDesc  = 'Conoce el Club Recreo Parrilladas El Negrito: un centro campestre a 10 minutos de Huanta, con parrillas, piscinas y hospedaje.';
$active    = 'nosotros';
include __DIR__ . '/includes/header.php';

/* ===== DATOS EDITABLES ===== */
$valores = [
    ['🔥', 'Sabor auténtico', 'Cocinamos a la parrilla, con el punto y el sabor que se disfruta en familia.'],
    ['🤝', 'Atención cercana', 'Recibimos a cada visitante como en casa: con calidez y buen trato.'],
    ['🌿', 'Naturaleza y descanso', 'Un espacio verde y tranquilo para olvidarte de la ciudad por un día.'],
];

$razones = [
    ['Cerca de Huanta',      'Solo 10 minutos desde la plaza central.'],
    ['Todo en un lugar',     'Comes, te refrescas en la piscina y descansas.'],
    ['Ideal para familias',  'Zona de juegos para niños y áreas verdes amplias.'],
    ['Celebra con nosotros', 'Salón principal para cumpleaños y reuniones.'],
    ['Quédate a dormir',     'Habitaciones con terraza y comedor, 24 horas.'],
    ['Precios accesibles',   'Consumo promedio de S/ 20 a S/ 40 por persona.'],
];
?>

<!-- ================= HERO INTERIOR ================= -->
<section class="page-hero">
  <div class="hero-bg" data-parallax style="background-image:url('<?= img('nosotros-hero.jpg', 'Banner · nosotros-hero.jpg') ?>')"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <p class="crumbs reveal"><a href="<?= BASE_URL ?>/index.php">Inicio</a> / Nosotros</p>
    <h1 class="reveal" style="--delay:.1s">Nuestra <em>casa</em>, tu casa</h1>
    <p class="reveal" style="--delay:.2s">Un centro campestre pensado para que disfrutes de la buena mesa, la naturaleza y el descanso.</p>
  </div>
</section>

<!-- ================= HISTORIA ================= -->
<section>
  <div class="container about-grid">
    <div class="about-img reveal from-left">
      <img src="<?= img('nosotros-historia.jpg', 'Foto · nosotros-historia.jpg') ?>" alt="Recreo El Negrito" loading="lazy">
    </div>
    <div class="about-text reveal from-right">
      <span class="eyebrow">Quiénes somos</span>
      <h2>Parrillas con <em>sabor a campo</em></h2>
      <div class="divider" style="margin-left:0"></div>
      <p>El Club Recreo Parrilladas El Negrito de Luricocha es un conocido centro campestre del distrito de Luricocha, a unos 10 minutos de la plaza central de Huanta.</p>
      <p>Somos especialistas en carnes a la parrilla y parrilladas mixtas, y además contamos con piscinas para niños y adultos, áreas verdes, zona de juegos, un salón para eventos y habitaciones para hospedarte.</p>
      <!-- Agrega aquí la historia real del negocio: quién lo fundó, cuándo empezó, etc. -->
      <a href="<?= BASE_URL ?>/instalaciones.php" class="btn btn-ghost">Ver instalaciones</a>
    </div>
  </div>
</section>

<!-- ================= VALORES ================= -->
<section class="bg-alt">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Lo que nos define</span>
      <h2>Nuestros <em>valores</em></h2>
      <div class="divider"></div>
    </div>
    <div class="cards">
      <?php foreach ($valores as $n => [$ico, $tit, $desc]): ?>
        <article class="card reveal" style="--delay:<?= $n * 0.12 ?>s">
          <div class="ico"><?= $ico ?></div>
          <h3><?= $tit ?></h3>
          <p><?= $desc ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= POR QUÉ ELEGIRNOS ================= -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Tu mejor plan</span>
      <h2>¿Por qué elegir <em>El Negrito</em>?</h2>
      <div class="divider"></div>
    </div>
    <ul class="check-list">
      <?php foreach ($razones as $n => [$tit, $desc]): ?>
        <li class="reveal" style="--delay:<?= ($n % 2) * 0.1 ?>s"><div><strong><?= $tit ?></strong><?= $desc ?></div></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ================= CTA ================= -->
<section class="cta">
  <div class="cta-bg" style="background-image:url('<?= img('cta.jpg', 'Foto de fondo · cta.jpg') ?>')"></div>
  <div class="container reveal">
    <span class="eyebrow">Te esperamos</span>
    <h2>Ven y <em>disfruta</em> con los tuyos</h2>
    <p>Reserva tu mesa, tu habitación o tu evento por WhatsApp.</p>
    <a href="<?= wa_link('Hola, quisiera reservar en Recreo El Negrito.') ?>" target="_blank" rel="noopener" class="btn btn-primary">Reservar por WhatsApp</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>