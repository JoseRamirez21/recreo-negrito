<?php
require_once __DIR__ . '/includes/config.php';
header('Content-Type: application/xml; charset=utf-8');

$base = base_abs();
$paginas = [
    'index.php'         => ['1.0', 'weekly'],
    'carta.php'         => ['0.9', 'weekly'],
    'hospedaje.php'     => ['0.8', 'monthly'],
    'eventos.php'       => ['0.8', 'monthly'],
    'reservas.php'      => ['0.8', 'monthly'],
    'instalaciones.php' => ['0.7', 'monthly'],
    'nosotros.php'      => ['0.7', 'monthly'],
    'contacto.php'      => ['0.7', 'monthly'],
    'galeria.php'       => ['0.6', 'monthly'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($paginas as $archivo => [$prioridad, $freq]) {
    $url = $base . '/' . ($archivo === 'index.php' ? '' : $archivo);
    $mod = date('Y-m-d', filemtime(__DIR__ . '/' . $archivo));
    echo "  <url><loc>" . htmlspecialchars($url) . "</loc><lastmod>$mod</lastmod>"
       . "<changefreq>$freq</changefreq><priority>$prioridad</priority></url>\n";
}
echo '</urlset>';