<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use \app\ViewFactory;

require dirname(__DIR__) . '/vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, false, false);

$viewDir = dirname(__DIR__) . '/src/views';
$dataDir = dirname(__DIR__) .'/src/data';

//
// Routes
//
$app->get('/', function (Request $request, Response $response, array $args) use($dataDir)  {
    $data = ViewFactory::make('index', ['skills' => require_once $dataDir . '/skills.php']);
    $response->getBody()->write($data);
    return $response;
});

$app->get('/bookmarks', function (Request $request, Response $response, array $args) use($dataDir) {
    $data = ViewFactory::make('bookmarks', ['bookmarks' => require_once $dataDir . '/bookmarks.php']);
    $response->getBody()->write($data);
    return $response;
});

$app->get('/frameworks', function (Request $request, Response $response, array $args) use($dataDir) {
    $data = ViewFactory::make('frameworks', []);
    $response->getBody()->write($data);
    return $response;
});

$app->get('/patterns', function (Request $request, Response $response, array $args) use($dataDir) {
    $data = ViewFactory::make('patterns', ['patterns' => require_once $dataDir . '/patterns.php']);
    $response->getBody()->write($data);
    return $response;
});

$app->get('/principles', function (Request $request, Response $response, array $args) use($dataDir) {
    $data = ViewFactory::make('principles', ['principles' => require_once $dataDir . '/principles.php']);
    $response->getBody()->write($data);
    return $response;
});

$app->get('/tools', function (Request $request, Response $response, array $args) use($dataDir) {
    $data = ViewFactory::make('tools', []);
    $response->getBody()->write($data);
    return $response;
});

$app->get('/tools/cloth-size', function (Request $request, Response $response, array $args) use($dataDir, $viewDir) {
    $data = require $viewDir . '/tools/cloth-size.html';
    $response->getBody()->write($data);
    return $response;
});

$app->get('/tools/decode', function (Request $request, Response $response, array $args) use($dataDir, $viewDir) {
    $data = require $viewDir . '/tools/decode.html';
    $response->getBody()->write($data);
    return $response;
});

$app->get('/tools/prefix', function (Request $request, Response $response, array $args) use($dataDir, $viewDir) {
    $data = require $viewDir . '/tools/prefix.html';
    $response->getBody()->write($data);
    return $response;
});


//var_dump($app->getRouteCollector()->getRoutes()['route1']->getPattern());die;

$app->run();
