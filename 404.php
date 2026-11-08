<?php
http_response_code(404);
$pageTitle = 'Página no encontrada | Recreo El Negrito';
$pageDesc  = 'La página que buscas no existe. Vuelve al inicio de Recreo El Negrito.';
$active    = '';
$noindex   = true;
include __DIR__ . '/includes/header.php';
?>

<section class="e404">
  <div class="embers" aria-hidden="true"></div>
  <div class="container">
    <span class="eyebrow reveal">Error 404</span>
    <div class="big404 reveal" style="--delay:.1s">404</div>
    <h1 class="reveal" style="--delay:.2s">Esta página se <em>quemó</em> en la parrilla</h1>
    <p class="reveal" style="--delay:.3s">No encontramos lo que buscas, pero la carta, las piscinas y el hospedaje siguen esperándote.</p>
    <div class="hero-actions reveal" style="--delay:.4s;justify-content:center">
      <a href="<?= BASE_URL ?>/index.php" class="btn btn-primary">Volver al inicio</a>
      <a href="<?= BASE_URL ?>/carta.php" class="btn btn-ghost">Ver la carta</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>