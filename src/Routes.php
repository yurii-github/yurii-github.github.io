<?php

use app\ViewFactory;
use Http\Factory\Guzzle\ServerRequestFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', function (Request $request, Response $response, array $args) {
    $data = ViewFactory::make('index', ['skills' => require_once DATA_DIR.'/skills.php']);
    $response->getBody()->write($data);

    return $response;
});

$app->get('/bookmarks', function (Request $request, Response $response, array $args) {
    $data = ViewFactory::make('bookmarks', ['bookmarks' => require_once DATA_DIR.'/bookmarks.php']);
    $response->getBody()->write($data);

    return $response;
});

$app->get('/frameworks', function (Request $request, Response $response, array $args) {
    $data = ViewFactory::make('frameworks', ['frameworks' => require_once DATA_DIR.'/frameworks.php']);
    $response->getBody()->write($data);

    return $response;
});

$app->get('/patterns', function (Request $request, Response $response, array $args) {
    $data = ViewFactory::make('patterns', ['patterns' => require_once DATA_DIR.'/patterns.php']);
    $response->getBody()->write($data);

    return $response;
});

$app->get('/principles', function (Request $request, Response $response, array $args) {
    $data = ViewFactory::make('principles', ['principles' => require_once DATA_DIR.'/principles.php']);
    $response->getBody()->write($data);

    return $response;
});

$app->get('/tools', function (Request $request, Response $response, array $args) {
    $data = ViewFactory::make('tools', []);
    $response->getBody()->write($data);

    return $response;
});

$app->get('/tools/cloth-size', function (Request $request, Response $response, array $args) {
    $data = file_get_contents(VIEW_DIR.'/tools/cloth-size.html');
    $response->getBody()->write($data);

    return $response;
});

$app->get('/tools/decode', function (Request $request, Response $response, array $args) {
    $data = file_get_contents(VIEW_DIR.'/tools/decode.html');
    $response->getBody()->write($data);

    return $response;
});

$app->get('/tools/prefix', function (Request $request, Response $response, array $args) {
    $data = file_get_contents(VIEW_DIR.'/tools/prefix.html');
    $response->getBody()->write($data);

    return $response;
});

if (PHP_SAPI === 'cli') {
    $app->get('/build', function (Request $request, Response $response, array $args) use ($app) {
        $pages = [
            '/' => '/index.html',
            '/bookmarks' => '/bookmarks.html',
            '/patterns' => '/patterns.html',
            '/frameworks' => '/frameworks.html',
            '/principles' => '/principles.html',
            '/tools' => '/tools.html',
            '/tools/cloth-size' => '/tools/cloth-size.html',
            '/tools/decode' => '/tools/decode.html',
            '/tools/prefix' => '/tools/prefix.html',
        ];

        $fs = new Illuminate\Filesystem\Filesystem();
        $output = $response->getBody();

        $output->write("--Pre-build--\n");
        $fs->deleteDirectory(BUILD_DIR);
        $fs->ensureDirectoryExists(BUILD_DIR.'/tools');
        $fs->copyDirectory(WEB_DIR.'/assets', BUILD_DIR.'/assets');
        $fs->copy(BASE_DIR.'/.gitignore', BUILD_DIR.'/.gitignore');

        $output->write("--Build--\n");
        foreach ($app->getRouteCollector()->getRoutes() as $route) {
            $uri = $route->getPattern();

            if ('/build' === $uri || !in_array($uri, array_keys($pages), true)) {
                continue;
            }

            $filename = BUILD_DIR.$pages[$uri];
            $output->write("${uri}:${filename} ... ");
            $request = (new ServerRequestFactory())->createServerRequest('GET', $uri, [
                'REQUEST_URI' => $uri, 'PATH_INFO' => $uri,
            ]);

            $html = (string) $route->run($request)->getBody();
            $html = str_replace(
                array_map(fn ($v) => "href=\"${v}\"", array_keys($pages)),
                array_map(fn ($v) => "href=\"${v}\"", array_values($pages)),
                $html
            );

            $fs->put($filename, $html);
            $output->write("done.\n");
        }

        $output->write("\nBUILD FINISHED\n");

        return $response;
    });
}
