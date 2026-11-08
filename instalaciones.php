<?php
$pageTitle = 'Instalaciones | Piscinas, áreas verdes y salón de eventos · El Negrito';
$pageDesc  = 'Conoce las instalaciones de Recreo El Negrito: piscinas para niños y adultos, áreas verdes, zona de juegos y salón de eventos en Luricocha.';
$active    = 'instalaciones';
include __DIR__ . '/includes/header.php';

/* ===== ZONAS (editar con datos reales: medidas, capacidad, etc.) =====
   [id, emoji, título, descripción, foto, [detalles]] */
$zonas = [
    ['piscinas', '🏊', 'Piscinas',
     'Refréscate con la familia. Contamos con piscinas para niños y para adultos, para que todos disfruten del día a su manera.',
     'instalaciones/piscinas.jpg',
     ['Piscina para adultos', 'Piscina para niños', 'Ideal para pasar el día en familia']],

    ['areas-verdes', '🌿', 'Áreas verdes',
     'Amplios espacios al aire libre rodeados de naturaleza, perfectos para conversar, descansar y desconectarte de la ciudad.',
     'instalaciones/areas-verdes.jpg',
     ['Ambiente campestre y tranquilo', 'Espacios para compartir en grupo', 'A solo 10 minutos de Huanta']],

    ['zona-ninos', '🎠', 'Zona de juegos para niños',
     'Un espacio pensado para que los más pequeños jueguen y se diviertan mientras los adultos disfrutan de la parrillada.',
     'instalaciones/zona-ninos.jpg',
     ['Juegos para los más pequeños', 'Cerca de las mesas para vigilarlos con tranquilidad']],

    ['salon', '🎉', 'Salón principal para eventos',
     'Celebra cumpleaños, aniversarios, reuniones y fechas especiales en nuestro salón, con la atención y el sabor de El Negrito.',
     'instalaciones/salon.jpg',
     ['Cumpleaños y aniversarios', 'Reuniones familiares y de empresa', 'Cotiza tu evento por WhatsApp']],
];

$llevar = [
    ['Traje de baño y toalla', 'Para disfrutar de las piscinas.'],
    ['Protector solar y gorra', 'El sol de Luricocha se siente, ¡cuídate!'],
    ['Ropa cómoda y de cambio', 'Para jugar, caminar y descansar.'],
    ['Ganas de pasarla bien', 'Lo demás lo ponemos nosotros.'],
];
?>

<!-- ================= HERO INTERIOR ================= -->
<section class="page-hero">
  <div class="hero-bg" data-parallax style="background-image:url('<?= img('instalaciones-hero.jpg', 'Banner · instalaciones-hero.jpg') ?>')"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <p class="crumbs reveal"><a href="<?= BASE_URL ?>/index.php">Inicio</a> / Instalaciones</p>
    <h1 class="reveal" style="--delay:.1s">Espacios para <em>disfrutar</em></h1>
    <p class="reveal" style="--delay:.2s">Piscinas, naturaleza, juegos y un salón para tus celebraciones, todo en un solo lugar.</p>
  </div>
</section>

<!-- ================= ZONAS ================= -->
<section style="padding-top:80px">
  <div class="container">
    <nav class="chips reveal" aria-label="Zonas">
      <?php foreach ($zonas as [$id, $ico, $tit]): ?>
        <a href="#<?= $id ?>"><?= $ico ?> <?= $tit ?></a>
      <?php endforeach; ?>
    </nav>

    <?php foreach ($zonas as $n => [$id, $ico, $tit, $desc, $foto, $detalles]): ?>
      <div class="zona <?= $n % 2 ? 'rev' : '' ?>" id="<?= $id ?>">
        <div class="about-grid">
          <div class="about-img reveal <?= $n % 2 ? 'from-right' : 'from-left' ?>">
            <img src="<?= img($foto, $tit . ' · ' . basename($foto)) ?>" alt="<?= htmlspecialchars($tit) ?>" loading="lazy">
          </div>
          <div class="about-text reveal <?= $n % 2 ? 'from-left' : 'from-right' ?>">
            <span class="ico-big"><?= $ico ?></span>
            <span class="eyebrow">0<?= $n + 1 ?> · Instalaciones</span>
            <h2><?= $tit ?></h2>
            <div class="divider" style="margin-left:0"></div>
            <p><?= $desc ?></p>
            <ul class="check-list">
              <?php foreach ($detalles as $d): ?><li><div><?= $d ?></div></li><?php endforeach; ?>
            </ul>
            <a class="btn btn-ghost" target="_blank" rel="noopener"
               href="<?= wa_link('Hola, quisiera más información sobre: ' . $tit) ?>">Consultar por WhatsApp</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ================= QUÉ LLEVAR ================= -->
<section class="bg-alt">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Antes de venir</span>
      <h2>¿Qué <em>llevar</em>?</h2>
      <div class="divider"></div>
    </div>
    <ul class="check-list">
      <?php foreach ($llevar as $n => [$tit, $desc]): ?>
        <li class="reveal" style="--delay:<?= ($n % 2) * 0.1 ?>s"><div><strong><?= $tit ?></strong><?= $desc ?></div></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ================= CTA ================= -->
<section class="cta">
  <div class="cta-bg" style="background-image:url('<?= img('cta.jpg', 'Foto de fondo · cta.jpg') ?>')"></div>
  <div class="container reveal">
    <span class="eyebrow">Tu día en el campo</span>
    <h2>Ven a conocer <em>El Negrito</em></h2>
    <p>Reserva y asegura tu lugar. Los martes descansamos, el resto de la semana te esperamos.</p>
    <a href="<?= BASE_URL ?>/reservas.php" class="btn btn-primary">Hacer una reserva</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>