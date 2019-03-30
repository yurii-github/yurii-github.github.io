<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

namespace App;

class Engine implements EngineInterface
{
    protected $baseUrl;
    protected $url;

    protected function pageMap()
    {
        return [
            '/' => 'index',
            '/frameworks' => 'frameworks',
            '/patterns' => 'patterns',
            '/principles' => 'principles',
            '/tools/prefix' => 'tools/prefix'
        ];
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
    public function handle()
    {
        $protocol = isset($_SERVER['HTTPS']) ? "https" : "http";
        $this->baseUrl = $protocol . '://' . $_SERVER['HTTP_HOST'];
        $this->url = $this->baseUrl . $_SERVER['REQUEST_URI'];

        $page = $this->pageMap()[$_SERVER['REQUEST_URI']] ?? null;

        if (!$page) {
            throw new \Exception('Unknown page');
        }

        echo $this->page($page);
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
    public function getData(string $name)
    {
        return json_decode(file_get_contents(__DIR__."/data/$name.json"));
    }

    /**
     * @inheritdoc
     */
    public function asset(string $path)
    {
        echo $this->getBaseUrl() . '/' . $path;
    }

    /**
     * Renders page
     *
     * @param string $name page name
     *
     * @return string
     */
    protected function page(string $name, $params = [])
    {
        extract($params);

        ob_start();
        require "views/pages/$name.php";
        $content = ob_get_clean();

        ob_start();
        require "views/layout.php";
        $html = ob_get_clean();

        return $html;
    }

}