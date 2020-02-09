<?php
use \app\ViewFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$viewDir = __DIR__ . '/views';
$dataDir = __DIR__ .'/data';

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
    $data = ViewFactory::make('frameworks', ['frameworks' => require_once $dataDir . '/frameworks.php']);
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
