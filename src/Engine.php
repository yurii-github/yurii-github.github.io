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

    protected $fs;
    protected $buildDir;

    public function __construct(Filesystem $filesystem)
    {
        $this->fs = $filesystem;
        $this->buildDir = $buildDir = dirname(__DIR__) . '/build';
    }

    protected function pageMap()
    {
        return [
            // url => page name
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
    public function action(string $pageName)
    {
        $url = array_flip($this->pageMap())[$pageName];
        $url = ($url == '/' ? 'index' : $url) . '.html';

        return $url;
    }

    public function build()
    {
        $buildDir = $this->buildDir;
        $this->fs->remove($buildDir);

        foreach ($this->pageMap() as $page) {
            $_SERVER['REQUEST_URI'] = $this->action($page);
            ob_start();
            echo $this->page($page);
            $content = ob_get_clean();

            $this->fs->dumpFile($buildDir . '/' . $_SERVER['REQUEST_URI'], $content);
        }
        $this->fs->copy(dirname(__DIR__).'/web/style.css', $buildDir.'/style.css');
        $this->fs->copy(dirname(__DIR__).'/web/elephant.png', $buildDir.'/elephant.png');
    }

    public function deploy()
    {
        $branch = 'dumb';
        $date = date('Y-md H:i:s');

        $this->build();

        exec('git add .');
        exec('git commit -m "created build '.$date.'"');
        exec('git checkout master');
        clearstatcache();

        echo "clean root from project dirs...\n";
        $finder = new Finder();
        $finder->directories()->in(dirname(__DIR__))->exclude(['.idea', '.git', 'vendor']);
        foreach ($finder as $file) {
            $this->fs->remove($file->getPathname());
        }

        echo "clean root from project files...\n";
        $finder = new Finder();
        $finder->directories()->in(dirname(__DIR__))->exclude(['.gitignore']);
        foreach ($finder as $file) {
            $this->fs->remove($file->getPathname());
        }

        exec("git checkout $branch -- build");
        clearstatcache();

        echo "make build dir as root...\n";
        $finder = new Finder();
        $finder->files()->in($this->buildDir);
        foreach ($finder as $file) {
            $this->fs->copy($file->getPathname(), dirname(__DIR__).'/'.$file->getRelativePathname());
        }
        $this->fs->remove($this->buildDir);

        exec('git add .');
        exec('git commit -m "added build '.$date.'"');

        exec("git checkout $branch");
        clearstatcache();

        exec("git push origin $branch");
        exec("git push origin master");
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
    public function asset(string $path)
    {
        echo '/' . $path;
        //echo $this->getBaseUrl() . '/' . $path;
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