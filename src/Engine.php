<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

namespace App;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class Engine implements EngineInterface
{
    protected $baseUrl;
    protected $url;
    protected $routes;

    public function __construct()
    {
        $this->routes = require dirname(__DIR__). '/routes.php';
    }

    public function routes()
    {
        return $this->routes;
    }

    protected function url()
    {
        return $this->url;
    }

    protected function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @inheritdoc
     */
    public function action(string $view)
    {
        return array_flip($this->routes)[$view];
    }

    /**
     * @inheritdoc
     */
    public function handle()
    {
        $protocol = isset($_SERVER['HTTPS']) ? "https" : "http";
        $this->baseUrl = $protocol . '://' . $_SERVER['HTTP_HOST'];
        $this->url = $this->baseUrl . $_SERVER['REQUEST_URI'];

        $view = $this->routes[$_SERVER['REQUEST_URI']] ?? null;

        if (!$view) {
            throw new \Exception('Unknown page');
        }

        echo $this->view($view);
    }

    /**
     * @inheritdoc
     */
    public function mtime(string $filename)
    {
        $date = date('Y-m-d H:i', filemtime($filename));
        echo "<h3>Last update: <time>$date</time></h3>";
    }

    /**
     * @inheritdoc
     */
    public function asset(string $path)
    {
        echo '/' . $path;
    }

    /**
     * @inheritdoc
     */
    public function view(string $name, array $params = [])
    {
        extract($params);

        ob_start();
        require "views/$name.php";
        $content = ob_get_clean();

        ob_start();
        require "views/layout.php";
        $html = ob_get_clean();

        return $html;
    }

}