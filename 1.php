<?php

$buildDir = __DIR__.'/build';

$pages = [
  'index',
  'patterns',
  'frameworks',
  'principles',
];



foreach ($pages as $page) {
    ob_start();
    require __DIR__."/web/{$page}.php";
    $html = ob_get_clean();
    file_put_contents("$buildDir/{$page}.html", $html);
}