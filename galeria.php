<?php
$pageTitle = 'Galería | Fotos de Recreo El Negrito, Luricocha';
$pageDesc  = 'Mira fotos de las parrilladas, piscinas, áreas verdes, eventos y habitaciones de Recreo El Negrito en Luricocha, Huanta.';
$active    = 'galeria';
$extraJs   = ['galeria.js'];
include __DIR__ . '/includes/header.php';

/* ===== CATEGORÍAS ===== */
$categorias = [
    'parrilladas' => 'Parrilladas',
    'piscinas'    => 'Piscinas',
    'areas'       => 'Áreas verdes y juegos',
    'eventos'     => 'Eventos',
    'hospedaje'   => 'Hospedaje',
];

/* ===== FOTOS (los títulos son ejemplos: ajústalos a tus fotos reales)
   [archivo, categoría, título, forma: '' | 'wide' | 'tall'] ===== */
$fotos = [
    ['galeria/foto-1.jpg',  'parrilladas', 'Parrillada mixta',        'wide'],
    ['galeria/foto-2.jpg',  'piscinas',    'Piscina',                 'tall'],
    ['galeria/foto-3.jpg',  'areas',       'Áreas verdes',            ''],
    ['galeria/foto-4.jpg',  'eventos',     'Celebración en el salón', ''],
    ['galeria/foto-5.jpg',  'hospedaje',   'Habitación con terraza',  ''],
    ['galeria/foto-6.jpg',  'parrilladas', 'Carnes a la brasa',       ''],
    ['galeria/foto-7.jpg',  'piscinas',    'Día de piscina',          'wide'],
    ['galeria/foto-8.jpg',  'areas',       'Zona de juegos',          'tall'],
    ['galeria/foto-9.jpg',  'eventos',     'Cumpleaños',              ''],
    ['galeria/foto-10.jpg', 'hospedaje',   'Terraza y descanso',      ''],
    ['galeria/foto-11.jpg', 'parrilladas', 'Anticuchos',              ''],
    ['galeria/foto-12.jpg', 'areas',       'Ambiente campestre',      ''],
];
?>

<!-- ================= HERO INTERIOR ================= -->
<section class="page-hero">
  <div class="hero-bg" data-parallax style="background-image:url('<?= img('galeria-hero.jpg', 'Banner · galeria-hero.jpg') ?>')"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <p class="crumbs reveal"><a href="<?= BASE_URL ?>/index.php">Inicio</a> / Galería</p>
    <h1 class="reveal" style="--delay:.1s">Mira cómo se <em>vive</em></h1>
    <p class="reveal" style="--delay:.2s">Parrilladas, piscinas, naturaleza y celebraciones. Un vistazo a lo que te espera.</p>
  </div>
</section>

<!-- ================= GALERÍA ================= -->
<section style="padding-top:80px">
  <div class="container">
    <div class="filters reveal">
      <button class="on" data-filter="all">Todo</button>
      <?php foreach ($categorias as $key => $nombre): ?>
        <button data-filter="<?= $key ?>"><?= $nombre ?></button>
      <?php endforeach; ?>
    </div>

    <div class="gal">
      <?php foreach ($fotos as [$archivo, $cat, $titulo, $forma]): ?>
        <button type="button" class="gal-item <?= $forma ?>" data-cat="<?= $cat ?>" data-cap="<?= htmlspecialchars($titulo) ?>" data-catname="<?= htmlspecialchars($categorias[$cat]) ?>" aria-label="Ampliar: <?= htmlspecialchars($titulo) ?>">
          <img src="<?= img($archivo, $titulo . ' · ' . basename($archivo)) ?>" alt="<?= htmlspecialchars($titulo) ?>" loading="lazy">
          <span class="cap"><small><?= $categorias[$cat] ?></small><?= $titulo ?></span>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= REDES ================= -->
<section class="bg-alt">
  <div class="container" style="text-align:center">
    <div class="section-head reveal" style="margin-bottom:30px">
      <span class="eyebrow">Más contenido</span>
      <h2>Síguenos en <em>redes</em></h2>
      <div class="divider"></div>
      <p>Mira videos, novedades y promociones en nuestras páginas.</p>
    </div>
    <div class="hero-actions reveal" style="justify-content:center">
      <a href="<?= TIKTOK ?>" target="_blank" rel="noopener" class="btn btn-primary">TikTok · @recreoelnegrito</a>
      <a href="<?= FACEBOOK ?>" target="_blank" rel="noopener" class="btn btn-ghost">Facebook</a>
    </div>
  </div>
</section>

<!-- ================= LIGHTBOX ================= -->
<div class="lb" id="lb" role="dialog" aria-modal="true" aria-label="Visor de fotos">
  <button class="lb-close" id="lbClose" aria-label="Cerrar">✕</button>
  <button class="lb-prev"  id="lbPrev"  aria-label="Anterior">‹</button>
  <button class="lb-next"  id="lbNext"  aria-label="Siguiente">›</button>
  <figure>
    <img id="lbImg" src="" alt="">
    <figcaption><span id="lbCap"></span><small id="lbCount"></small></figcaption>
  </figure>
</div>

<!-- ================= CTA ================= -->
<section class="cta">
  <div class="cta-bg" style="background-image:url('<?= img('cta.jpg', 'Foto de fondo · cta.jpg') ?>')"></div>
  <div class="container reveal">
    <span class="eyebrow">Ahora te toca a ti</span>
    <h2>Ven a vivirlo en <em>persona</em></h2>
    <p>Reserva tu mesa, tu habitación o tu evento por WhatsApp.</p>
    <a href="<?= BASE_URL ?>/reservas.php" class="btn btn-primary">Hacer una reserva</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>