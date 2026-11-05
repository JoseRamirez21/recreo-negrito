<?php
require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? SITE_NAME . ' | Parrilladas y Recreo en Luricocha, Huanta';
$pageDesc  = $pageDesc  ?? 'Parrilladas, piscinas, áreas verdes, salón de eventos y hospedaje a 10 minutos de Huanta. Reserva por WhatsApp.';
$active    = $active ?? 'index';

$menu = [
    'index'         => ['Inicio',        'index.php'],
    'nosotros'      => ['Nosotros',      'nosotros.php'],
    'carta'         => ['Carta',         'carta.php'],
    'instalaciones' => ['Instalaciones', 'instalaciones.php'],
    'hospedaje'     => ['Hospedaje',     'hospedaje.php'],
    'eventos'       => ['Eventos',       'eventos.php'],
    'galeria'       => ['Galería',       'galeria.php'],
    'contacto'      => ['Contacto',      'contacto.php'],
];
$estado = estado_hoy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($pageTitle) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
<meta name="theme-color" content="#14100d">

<!-- Open Graph (cómo se ve al compartir por WhatsApp/Facebook) -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
<meta property="og:image" content="<?= has_img('hero.jpg') ? BASE_URL . '/assets/img/hero.jpg' : '' ?>">
<meta property="og:locale" content="es_PE">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">

<!-- SEO local: datos estructurados -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Restaurant",
  "name": "Club Recreo Parrilladas El Negrito de Luricocha",
  "servesCuisine": "Parrillas",
  "telephone": "+51997529318",
  "priceRange": "S/ 20 - S/ 40",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Luricocha, Huanta",
    "addressRegion": "Ayacucho",
    "addressCountry": "PE"
  },
  "sameAs": ["<?= FACEBOOK ?>", "<?= TIKTOK ?>"]
}
</script>
</head>
<body>

<!-- Preloader -->
<div class="preloader" id="preloader">
  <div class="preloader-inner">
    <div class="flame"></div>
    <p>El Negrito</p>
  </div>
</div>

<!-- Transición entre páginas -->
<div class="page-transition" id="pageTransition"></div>

<!-- Cursor personalizado (solo escritorio) -->
<div class="cursor-dot" id="cursorDot"></div>
<div class="cursor-ring" id="cursorRing"></div>

<nav class="nav" id="nav">
  <div class="container nav-inner">
    <a href="<?= BASE_URL ?>/index.php" class="brand">
      <?php if (has_img('logo.png')): ?>
        <img src="<?= BASE_URL ?>/assets/img/logo.png" alt="<?= SITE_NAME ?>">
      <?php endif; ?>
      <span>El Negrito<small>Recreo · Luricocha</small></span>
    </a>

    <div class="menu" id="menu">
      <?php foreach ($menu as $key => [$label, $file]): ?>
        <a href="<?= BASE_URL . '/' . $file ?>" class="<?= $active === $key ? 'active' : '' ?>"><?= $label ?></a>
      <?php endforeach; ?>
      <a href="<?= BASE_URL ?>/reservas.php" class="btn btn-primary btn-sm">Reservar</a>
    </div>

    <button class="burger" id="burger" aria-label="Abrir menú"><span></span><span></span><span></span></button>
  </div>
</nav>