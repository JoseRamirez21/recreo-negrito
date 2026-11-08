<?php
require_once __DIR__ . '/includes/config.php';
header('Content-Type: text/plain; charset=utf-8');

echo "User-agent: *\n";
echo "Allow: /\n";
echo "Disallow: /includes/\n\n";
echo "Sitemap: " . base_abs() . "/sitemap.xml\n";