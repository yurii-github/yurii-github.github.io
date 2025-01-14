<?php

namespace app;

use Illuminate\Contracts\View\View;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

final class ViewFactory
{
    public static function make(string $view, array $data = []): View
    {
        $er = new EngineResolver();
        $er->register('blade', fn () => new CompilerEngine(new BladeCompiler(new Filesystem(), CACHE_DIR)));

        return (new Factory($er, new FileViewFinder(new Filesystem(), [VIEW_DIR]), new Dispatcher()))
            ->make($view, $data);
    }
}
