<?php

use Slim\Factory\AppFactory;

define('BASE_DIR', dirname(__DIR__));
define('WEB_DIR', BASE_DIR . '/web');
define('BUILD_DIR', BASE_DIR . '/build');
define('VIEW_DIR', BASE_DIR . '/src/views');
define('DATA_DIR', BASE_DIR . '/src/data');
define('CACHE_DIR', BASE_DIR . '/cache');

require dirname(__DIR__) . '/vendor/autoload.php';

$app = AppFactory::create();
//$app->addErrorMiddleware(true, false, false);

require_once dirname(__DIR__) . '/src/Routes.php';

if (php_sapi_name() === 'cli') {
    $_SERVER['PATH_INFO'] = $_SERVER['REQUEST_URI'] = '/build';
}

$app->run();
