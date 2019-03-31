<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

namespace App;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class GithubBuilder
{
    protected $fs;
    protected $buildDir;
    protected $engine;

    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
        $this->fs = new Filesystem();
        $this->buildDir = dirname(__DIR__) . '/build';
    }

    public function build()
    {
        $buildDir = $this->buildDir;
        $this->fs->remove($buildDir);

        foreach ($this->engine->routes() as $view) {
            $_SERVER['REQUEST_URI'] = $this->engine->view($view);
            ob_start();
            echo $this->engine->view($view);
            $content = ob_get_clean();

            $this->fs->dumpFile($buildDir . '/' . $_SERVER['REQUEST_URI'], $content);
        }
        $this->fs->copy(dirname(__DIR__) . '/web/style.css', $buildDir . '/style.css');
        $this->fs->copy(dirname(__DIR__) . '/web/elephant.png', $buildDir . '/elephant.png');
    }

    public function deploy()
    {
        $branch = 'dumb';
        $date = date('Y-m-d H:i:s');
        $baseDir = dirname(__DIR__);

        $this->build();

        exec('git add .');
        exec('git commit -m "created build ' . $date . '"');
        exec('git checkout master');
//        sleep(2);
//        clearstatcache();
//
//        echo "clean root from project dirs...\n";
//        glob($baseDir);
//        $finder = new Finder();
//        $finder->directories()->in($baseDir)->exclude(['.idea', '.git', 'vendor']);
//        foreach ($finder as $file) {
//            $this->fs->remove($file->getPathname());
//        }
//
//        echo "clean root from project files...\n";
//        $finder = new Finder();
//        $finder->directories()->in($baseDir)->exclude(['.gitignore']);
//        foreach ($finder as $file) {
//            $this->fs->remove($file->getPathname());
//        }

        exec("git checkout $branch -- build");
        // clearstatcache();

        echo "make build dir as root...\n";
        $finder = new Finder();
        $finder->files()->in($this->buildDir);
        foreach ($finder as $file) {
            $this->fs->copy($file->getPathname(), $baseDir . '/' . $file->getRelativePathname());
        }
        $this->fs->remove($this->buildDir);

        exec('git add .');
        exec('git commit -m "added build ' . $date . '"');

        exec("git checkout $branch");
        //  clearstatcache();

        exec("git push origin $branch");
        exec("git push origin master");
    }
}