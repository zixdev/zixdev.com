<?php

namespace Zix\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Zix\Blog\Http\Controllers';

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->registerRoutes();
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    public function registerRoutes()
    {
        Route::group([
            'namespace' => $this->namespace,
            'prefix'    => env('API_PREFIX')
        ], function () {

            $files = File::files(__DIR__.'/../Http/Routes/api');

            foreach($files as $file) {
                File::getRequire($file);
            }
        });
        Route::group([
            'namespace' => $this->namespace,
        ], function () {

            $files = File::files(__DIR__.'/../Http/Routes/web');

            foreach($files as $file) {
                File::getRequire($file);
            }
        });
    }



}
