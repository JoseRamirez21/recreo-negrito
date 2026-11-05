<?php
$pageTitle = 'Carta | Parrilladas y platos de Recreo El Negrito';
$pageDesc  = 'Mira la carta de Recreo El Negrito: parrillas, acompañamientos y bebidas. Arma tu parrillada y pide por WhatsApp.';
$active    = 'carta';
$extraJs   = ['carta.js'];
include __DIR__ . '/includes/header.php';

/* ===== CARTA (EJEMPLOS: reemplazar por la carta real) =====
   Formato: [nombre, foto, descripción, precio]  → precio null = "Consultar" */
$categorias = [
    'parrillas'       => 'Parrillas',
    'acompanamientos' => 'Acompañamientos',
    'bebidas'         => 'Bebidas',
];

$carta = [
    'parrillas' => [
        ['Parrillada mixta',      'carta/parrillada.jpg', 'Selección de carnes a la brasa para compartir.', null],
        ['Chuleta a la parrilla', 'carta/chuleta.jpg',    'Jugosa, con papas y ensalada fresca.',          null],
        ['Anticuchos',            'carta/anticuchos.jpg', 'Clásico sabor de brasa con ají de la casa.',     null],
        ['Pollo a la parrilla',   'carta/pollo.jpg',      'Dorado al carbón, con guarniciones.',            null],
    ],
    'acompanamientos' => [
        ['Papas doradas',         'carta/papas.jpg',      'Crocantes por fuera, suaves por dentro.',        null],
        ['Ensalada fresca',       'carta/ensalada.jpg',   'Verduras frescas del día.',                      null],
        ['Choclo con queso',      'carta/choclo.jpg',     'Tradicional y siempre bienvenido.',              null],
    ],
    'bebidas' => [
        ['Chicha morada',         'carta/chicha.jpg',     'Refrescante, preparada en casa.',                null],
        ['Gaseosas',              'carta/gaseosa.jpg',    'Variedad de sabores, bien heladas.',             null],
        ['Cervezas',              'carta/cerveza.jpg',    'Para acompañar la parrilla.',                    null],
    ],
];

/* ===== ARMADOR (PRECIOS ESTIMADOS: ajustar con los reales) ===== */
$tipos = [
    ['clasica',  'Parrilla clásica',  'Pollo, chorizo y chuleta', 25],
    ['especial', 'Parrilla especial', 'Carnes selectas y anticuchos', 35],
];
$extras = [
    ['bebida',     'Bebida por persona',     5],
    ['guarnicion', 'Papas y ensalada extra', 6],
];
?>

<!-- ================= HERO INTERIOR ================= -->
<section class="page-hero">
  <div class="hero-bg" data-parallax style="background-image:url('<?= img('carta-hero.jpg', 'Banner · carta-hero.jpg') ?>')"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <p class="crumbs reveal"><a href="<?= BASE_URL ?>/index.php">Inicio</a> / Carta</p>
    <h1 class="reveal" style="--delay:.1s">Nuestra <em>carta</em></h1>
    <p class="reveal" style="--delay:.2s">Del fuego a tu mesa. Consumo promedio de S/ 20 a S/ 40 por persona.</p>
  </div>
</section>

<!-- ================= CARTA ================= -->
<section>
  <div class="container">
    <div class="filters reveal">
      <button class="on" data-filter="all">Todo</button>
      <?php foreach ($categorias as $key => $nombre): ?>
        <button data-filter="<?= $key ?>"><?= $nombre ?></button>
      <?php endforeach; ?>
    </div>

    <div class="platos">
      <?php foreach ($carta as $cat => $items): foreach ($items as [$nom, $foto, $desc, $precio]): ?>
        <article class="plato" data-cat="<?= $cat ?>">
          <div class="plato-img"><img src="<?= img($foto, $nom) ?>" alt="<?= htmlspecialchars($nom) ?>" loading="lazy"></div>
          <div class="plato-body">
            <h3><?= $nom ?></h3>
            <p><?= $desc ?></p>
            <span class="precio"><?= $precio ? 'S/ ' . number_format($precio, 2) : 'Consultar precio' ?></span>
            <a class="plato-link" target="_blank" rel="noopener"
               href="<?= wa_link('Hola, quisiera pedir / consultar: ' . $nom) ?>">Pedir →</a>
          </div>
        </article>
      <?php endforeach; endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= ARMADOR DE PARRILLADA ================= -->
<section class="bg-alt" id="armador-seccion">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Hazlo a tu medida</span>
      <h2>Arma tu <em>parrillada</em></h2>
      <div class="divider"></div>
      <p>Elige cuántos son, qué parrilla prefieren y recibe un estimado al instante. Luego lo enviamos por WhatsApp.</p>
    </div>

    <div class="armador" id="armador" data-wa="<?= WHATSAPP ?>">
      <div class="arm-panel reveal from-left">
        <div class="arm-group">
          <span class="arm-title">1 · ¿Cuántas personas?</span>
          <div class="stepper">
            <button type="button" id="menos" aria-label="Menos">−</button>
            <output id="personas">4</output>
            <button type="button" id="mas" aria-label="Más">+</button>
          </div>
        </div>

        <div class="arm-group">
          <span class="arm-title">2 · Tipo de parrilla</span>
          <?php foreach ($tipos as $i => [$id, $nom, $desc, $precio]): ?>
            <label class="opt">
              <input type="radio" name="tipo" value="<?= $id ?>" data-nombre="<?= $nom ?>" data-precio="<?= $precio ?>" <?= $i === 0 ? 'checked' : '' ?>>
              <span><div><?= $nom ?><small><?= $desc ?></small></div><b>S/ <?= $precio ?> p/p</b></span>
            </label>
          <?php endforeach; ?>
        </div>

        <div class="arm-group">
          <span class="arm-title">3 · Extras (opcional)</span>
          <?php foreach ($extras as [$id, $nom, $precio]): ?>
            <label class="opt">
              <input type="checkbox" name="extra" value="<?= $id ?>" data-nombre="<?= $nom ?>" data-precio="<?= $precio ?>">
              <span><div><?= $nom ?></div><b>+ S/ <?= $precio ?> p/p</b></span>
            </label>
          <?php endforeach; ?>
        </div>

        <div class="arm-group">
          <span class="arm-title">4 · ¿Qué día piensan venir? (opcional)</span>
          <input type="date" id="fecha" class="arm-input">
          <p class="arm-warn" id="avisoMartes">Los martes no atendemos. Elige otro día, por favor.</p>
        </div>
      </div>

      <aside class="arm-panel arm-total reveal from-right">
        <span class="arm-title">Tu estimado</span>
        <div class="amount" id="total">S/ 0.00</div>
        <ul id="resumen"></ul>
        <a id="enviarWa" class="btn btn-primary" target="_blank" rel="noopener" href="#">Enviar por WhatsApp</a>
        <p class="note">Precio referencial. El monto final se confirma al reservar.</p>
      </aside>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>