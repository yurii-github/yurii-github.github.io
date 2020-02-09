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
        $er = new EngineResolver();
        $er->register('blade', fn() => new CompilerEngine(new BladeCompiler(new Filesystem(), CACHE_DIR)));

        return (new Factory($er, new FileViewFinder(new Filesystem(), [VIEW_DIR]), new Dispatcher()))
            ->make($view, $data);
    }
}
