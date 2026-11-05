<?php
date_default_timezone_set('America/Lima');

define('SITE_NAME',   'Recreo El Negrito');
define('SITE_TAGLINE','Parrilladas · Piscinas · Hospedaje');
define('BASE_URL',    '/recreo-negrito');          // cambia si lo subes a un dominio: ''
define('WHATSAPP',    '51997529318');
define('PHONE_TXT',   '997 529 318');
define('ADDRESS',     'A pocas cuadras de la Municipalidad de Luricocha, Huanta – Ayacucho');

define('FACEBOOK', 'https://www.facebook.com/p/Club-Recreo-Parrilladas-El-Negrito-de-Luricocha-100083129690279/');
define('TIKTOK',   'https://www.tiktok.com/@recreoelnegrito');
define('WAZE',     'https://www.waze.com/es/live-map/directions/pe/ayacucho/huanta/recreo-el-negrito?to=place.ChIJ9Q6vn-GDDZERxF_obvzCtF0');
define('GMAPS',    'https://www.google.com/maps/search/?api=1&query=Recreo+El+Negrito+Luricocha');
define('MAPS_EMBED','https://www.google.com/maps?q=Recreo+El+Negrito+Luricocha&output=embed');

// Horario (CONFIRMAR con el dueño)
define('HORA_ABRE',  9);   // 9 am
define('HORA_CIERRA',18);  // 6 pm
define('DIA_CERRADO', 2);  // 1=lunes ... 2=martes

/** URL de una imagen; si no existe, devuelve un marcador SVG elegante */
function img(string $rel, string $label = 'Foto'): string {
    $file = __DIR__ . '/../assets/img/' . $rel;
    if (is_file($file)) return BASE_URL . '/assets/img/' . $rel;
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="800" viewBox="0 0 1200 800">'
         . '<defs><linearGradient id="g" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#2a1a12"/>'
         . '<stop offset="1" stop-color="#6b2d1c"/></linearGradient></defs>'
         . '<rect width="1200" height="800" fill="url(#g)"/>'
         . '<text x="600" y="410" fill="#d4a24c" font-family="Georgia,serif" font-size="44" text-anchor="middle" opacity=".75">'
         . htmlspecialchars($label) . '</text></svg>';
    return 'data:image/svg+xml;charset=utf-8,' . rawurlencode($svg);
}

function has_img(string $rel): bool {
    return is_file(__DIR__ . '/../assets/img/' . $rel);
}

function wa_link(string $msg = 'Hola, quisiera hacer una consulta.'): string {
    return 'https://wa.me/' . WHATSAPP . '?text=' . rawurlencode($msg);
}

/** Estado en vivo: abierto / cerrado hoy */
function estado_hoy(): array {
    $dia  = (int)date('N');
    $hora = (int)date('G');
    if ($dia === DIA_CERRADO) {
        return ['abierto' => false, 'texto' => 'Hoy descansamos · Te esperamos mañana'];
    }
    if ($hora >= HORA_ABRE && $hora < HORA_CIERRA) {
        return ['abierto' => true, 'texto' => 'Abierto ahora · hasta las ' . (HORA_CIERRA - 12) . ' pm'];
    }
    return ['abierto' => false, 'texto' => 'Cerrado por ahora · Abrimos a las ' . HORA_ABRE . ' am'];
}