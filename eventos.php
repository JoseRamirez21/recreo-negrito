<?php
$pageTitle = 'Eventos | Cumpleaños y celebraciones en Luricocha, Huanta · El Negrito';
$pageDesc  = 'Celebra tu cumpleaños, aniversario o reunión en el salón principal de Recreo El Negrito. Cotiza tu evento por WhatsApp.';
$active    = 'eventos';
$extraJs   = ['eventos.js'];
include __DIR__ . '/includes/header.php';

/* ===== TIPOS DE EVENTO (ejemplos: ajustar a lo que realmente atienden) ===== */
$tipos_evento = [
    ['🎂', 'Cumpleaños',           'Celebra con tu familia y amigos, con parrilla, piscina y mucho espacio.'],
    ['💞', 'Aniversarios',         'Un ambiente campestre y acogedor para fechas que merecen recordarse.'],
    ['👨‍👩‍👧', 'Reuniones familiares', 'Reencuentros, almuerzos y celebraciones en un solo lugar.'],
    ['💼', 'Eventos de empresa',   'Integraciones y reuniones de trabajo lejos del ruido de la ciudad.'],
    ['🎓', 'Graduaciones y despedidas', 'Cierra una etapa con una celebración al aire libre.'],
    ['🥂', 'Celebraciones especiales', 'Cuéntanos tu idea y la conversamos por WhatsApp.'],
];

$pasos = [
    ['Cuéntanos tu idea',  'Dinos qué celebras, cuántos son y qué día piensan venir.'],
    ['Recibe tu cotización','Te respondemos por WhatsApp con el detalle y las opciones.'],
    ['Confirma tu fecha',  'Coordinamos los detalles para asegurar tu evento.'],
    ['Disfruta',           'Tú celebras, nosotros nos encargamos de la parrilla y la atención.'],
];

/* ===== CALCULADORA (PRECIOS ESTIMADOS: ajustar con los reales)
   precio null = "A cotizar" (no suma al total) */
$servicios = [
    ['solo',     'Solo el salón',        'Sin comida incluida',                 0],
    ['clasica',  'Parrilla clásica',     'Pollo, chorizo y chuleta',            25],
    ['especial', 'Parrilla especial',    'Carnes selectas y anticuchos',        35],
];
$extras = [
    ['bebidas',   'Bebidas por persona',     5,    'p/p'],
    ['guarnicion','Papas y ensalada extra',  6,    'p/p'],
    ['decoracion','Decoración del salón',    null, ''],
    ['sonido',    'Sonido / música',         null, ''],
    ['torta',     'Torta o postre',          null, ''],
];

$faq = [
    ['¿Con cuánta anticipación debo reservar?',
     'Te recomendamos escribirnos con la mayor anticipación posible para asegurar tu fecha. Consulta disponibilidad por WhatsApp.'],
    ['¿Qué días atienden eventos?',
     'Atendemos de miércoles a lunes. Los martes descansamos.'],
    ['¿Puedo combinar mi evento con hospedaje?',
     'Sí. Contamos con habitaciones con terraza y comedor, disponibles las 24 horas. Consúltanos por las fechas que necesitas.'],
    ['¿Cómo se confirma la reserva?',
     'Por WhatsApp: te enviamos la cotización y coordinamos contigo los detalles para confirmar.'],
    ['¿Cuántas personas entran en el salón?',
     // Reemplazar por la capacidad real del salón
     'La capacidad depende del tipo de evento y la distribución. Escríbenos y te orientamos según tu número de invitados.'],
];
?>

<!-- ================= HERO INTERIOR ================= -->
<section class="page-hero">
  <div class="hero-bg" data-parallax style="background-image:url('<?= img('eventos-hero.jpg', 'Banner · eventos-hero.jpg') ?>')"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <p class="crumbs reveal"><a href="<?= BASE_URL ?>/index.php">Inicio</a> / Eventos</p>
    <h1 class="reveal" style="--delay:.1s">Celebra a lo <em>grande</em></h1>
    <p class="reveal" style="--delay:.2s">Salón principal, parrilla, piscina y áreas verdes para que tu evento sea inolvidable.</p>
  </div>
</section>

<!-- ================= NUESTRO SALÓN ================= -->
<section>
  <div class="container about-grid">
    <div class="about-img reveal from-left">
      <img src="<?= img('instalaciones/salon.jpg', 'Salón · instalaciones/salon.jpg') ?>" alt="Salón principal de eventos" loading="lazy">
    </div>
    <div class="about-text reveal from-right">
      <span class="eyebrow">Nuestro salón</span>
      <h2>Tu evento, en un <em>entorno campestre</em></h2>
      <div class="divider" style="margin-left:0"></div>
      <p>Contamos con un salón principal para eventos, rodeado de áreas verdes y a solo 10 minutos de la plaza central de Huanta.</p>
      <p>Tus invitados pueden comer de la parrilla, refrescarse en las piscinas y los más pequeños disfrutar de la zona de juegos.</p>
      <a href="<?= BASE_URL ?>/instalaciones.php#salon" class="btn btn-ghost">Ver instalaciones</a>
    </div>
  </div>
</section>

<!-- ================= TIPOS DE EVENTO ================= -->
<section class="bg-alt">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Para cada ocasión</span>
      <h2>¿Qué vas a <em>celebrar</em>?</h2>
      <div class="divider"></div>
    </div>
    <div class="cards">
      <?php foreach ($tipos_evento as $n => [$ico, $tit, $desc]): ?>
        <article class="card reveal" style="--delay:<?= ($n % 3) * 0.12 ?>s">
          <div class="ico"><?= $ico ?></div>
          <h3><?= $tit ?></h3>
          <p><?= $desc ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= CÓMO RESERVAR ================= -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Así de fácil</span>
      <h2>Cómo <em>reservar</em></h2>
      <div class="divider"></div>
    </div>
    <div class="steps">
      <?php foreach ($pasos as $n => [$tit, $desc]): ?>
        <div class="step reveal" style="--delay:<?= $n * 0.12 ?>s">
          <div class="num"><?= $n + 1 ?></div>
          <h3><?= $tit ?></h3>
          <p><?= $desc ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= CALCULADORA DE COTIZACIÓN ================= -->
<section class="bg-alt" id="cotizar">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Cotiza tu evento</span>
      <h2>Calcula tu <em>presupuesto</em></h2>
      <div class="divider"></div>
      <p>Obtén un estimado de comida y bebidas al instante. El salón y los servicios adicionales se cotizan por WhatsApp.</p>
    </div>

    <div class="armador" id="evento" data-wa="<?= WHATSAPP ?>">
      <div class="arm-panel reveal from-left">
        <div class="arm-group">
          <span class="arm-title">1 · Tipo de evento</span>
          <select id="tipoEvento" class="arm-input">
            <?php foreach ($tipos_evento as [$ico, $tit]): ?>
              <option value="<?= htmlspecialchars($tit) ?>"><?= $tit ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="arm-group">
          <span class="arm-title">2 · ¿Cuántos invitados?</span>
          <div class="stepper">
            <button type="button" id="menosInv" aria-label="Menos">−</button>
            <output id="invitados">30</output>
            <button type="button" id="masInv" aria-label="Más">+</button>
          </div>
        </div>

        <div class="arm-group">
          <span class="arm-title">3 · Comida</span>
          <?php foreach ($servicios as $i => [$id, $nom, $desc, $precio]): ?>
            <label class="opt">
              <input type="radio" name="servicio" value="<?= $id ?>" data-nombre="<?= $nom ?>" data-precio="<?= $precio ?>" <?= $i === 1 ? 'checked' : '' ?>>
              <span><div><?= $nom ?><small><?= $desc ?></small></div><b><?= $precio ? 'S/ ' . $precio . ' p/p' : 'Sin costo' ?></b></span>
            </label>
          <?php endforeach; ?>
        </div>

        <div class="arm-group">
          <span class="arm-title">4 · Extras (opcional)</span>
          <?php foreach ($extras as [$id, $nom, $precio, $unidad]): ?>
            <label class="opt">
              <input type="checkbox" name="extra" value="<?= $id ?>" data-nombre="<?= $nom ?>" data-precio="<?= $precio ?? '' ?>">
              <span><div><?= $nom ?></div><b><?= $precio ? '+ S/ ' . $precio . ' ' . $unidad : 'A cotizar' ?></b></span>
            </label>
          <?php endforeach; ?>
        </div>

        <div class="arm-group">
          <span class="arm-title">5 · Fecha y nombre (opcional)</span>
          <div class="form-row">
            <div>
              <label class="arm-label" for="fechaEv">Fecha del evento</label>
              <input type="date" id="fechaEv" class="arm-input">
            </div>
            <div>
              <label class="arm-label" for="nombreEv">A nombre de</label>
              <input type="text" id="nombreEv" class="arm-input" placeholder="Tu nombre" maxlength="60">
            </div>
          </div>
          <p class="arm-warn" id="avisoMartesEv">Los martes no atendemos. Elige otro día, por favor.</p>
        </div>
      </div>

      <aside class="arm-panel arm-total reveal from-right">
        <span class="arm-title">Estimado de comida y bebidas</span>
        <div class="amount" id="totalEv">S/ 0.00</div>
        <ul id="resumenEv"></ul>
        <a id="enviarEv" class="btn btn-primary" target="_blank" rel="noopener" href="#">Pedir cotización por WhatsApp</a>
        <p class="note">Precio referencial. El salón, la decoración y los servicios marcados "a cotizar" se confirman por WhatsApp.</p>
      </aside>
    </div>
  </div>
</section>

<!-- ================= PREGUNTAS FRECUENTES ================= -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Resolvemos tus dudas</span>
      <h2>Preguntas <em>frecuentes</em></h2>
      <div class="divider"></div>
    </div>
    <div class="faq reveal">
      <?php foreach ($faq as [$q, $a]): ?>
        <details>
          <summary><?= $q ?></summary>
          <p><?= $a ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= CTA ================= -->
<section class="cta">
  <div class="cta-bg" style="background-image:url('<?= img('cta.jpg', 'Foto de fondo · cta.jpg') ?>')"></div>
  <div class="container reveal">
    <span class="eyebrow">Hagámoslo realidad</span>
    <h2>Tu próxima celebración, en <em>El Negrito</em></h2>
    <p>Cuéntanos qué tienes en mente y te ayudamos a organizarlo.</p>
    <a href="<?= wa_link('Hola, quisiera cotizar un evento en Recreo El Negrito.') ?>" target="_blank" rel="noopener" class="btn btn-primary">Hablar por WhatsApp · <?= PHONE_TXT ?></a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>