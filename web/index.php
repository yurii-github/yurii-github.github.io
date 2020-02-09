<?php

use Slim\Factory\AppFactory;


require dirname(__DIR__) . '/vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, false, false);

require_once dirname(__DIR__) . '/src/Routes.php';

//var_dump($app->getRouteCollector()->getRoutes()['route1']->getPattern());die;

$app->run();
