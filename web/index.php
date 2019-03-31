<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

/**
 * @see https://www.php.net/manual/en/features.commandline.webserver.php
 */
if (php_sapi_name() === 'cli-server' && preg_match('/\.(?:png|jpg|jpeg|gif|js|css)$/', $_SERVER["REQUEST_URI"])) {
    return false; // serve the requested resource as-is.
}

require_once dirname(__DIR__) .'/vendor/autoload.php';

$app = new \App\Engine();
$argv = $argv ?? [];

if (in_array('--build', $argv)) {
    (new \App\GithubBuilder($app))->build();
    return;
}

if(in_array('--deploy', $argv)) {
    (new \App\GithubBuilder($app))->deploy();
    return;
}


(new \App\Engine())->handle();
