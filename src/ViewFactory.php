<?php

namespace app;

use \Illuminate\View\Compilers\BladeCompiler;
use \Illuminate\Filesystem\Filesystem;
use \Illuminate\View\Engines\CompilerEngine;
use \Illuminate\View\Engines\EngineResolver;
use \Illuminate\View\FileViewFinder;
use \Illuminate\View\Factory;
use \Illuminate\Events\Dispatcher;

final class ViewFactory
{
    /**
     * @param string $view
     * @param array $data
     * @return \Illuminate\Contracts\View\View
     */
    static public function make(string $view, array $data = [])
    {
        $path = __DIR__ . '/views';
        $cacheDir = dirname(__DIR__) . '/cache';

        $bc = new BladeCompiler(new Filesystem(), $cacheDir);
        //$bc->include($path .'/_layout.blade.php', '_layout');
        $engine = new CompilerEngine($bc);

        $er = new EngineResolver();
        $er->register('blade', fn() => $engine);
        $finder = new FileViewFinder(new Filesystem(), [$path]);

        $factory = new Factory($er, $finder, new Dispatcher());

        return $factory->make($view, $data);
    }
}
