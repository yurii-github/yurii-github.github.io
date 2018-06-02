<?php

$buildDir = __DIR__.'/build';

$pages = [
  'index' => 'index.php',
  'patterns' => 'patterns.php',
  'frameworks' => 'frameworks.php',
  'principles' => 'principles.php',
];

foreach ($pages as $page => $link) {
    ob_start();
    require __DIR__."/web/{$page}.php";
    $html = ob_get_clean();
    $html = preg_replace('/href="(.*).php"/', 'href="${1}.html"', $html);
    file_put_contents("$buildDir/{$page}.html", $html);
}