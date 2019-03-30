<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

require_once dirname(__DIR__) .'/vendor/autoload.php';


$fs = new \Symfony\Component\Filesystem\Filesystem();

if (in_array('--build', $argv)) {
    (new \App\Engine($fs))->build();
} else {
    (new \App\Engine($fs))->handle();
}
