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
} elseif(in_array('--deploy', $argv)) {
    (new \App\Engine($fs))->deploy();
} else {
    (new \App\Engine($fs))->handle();
}
