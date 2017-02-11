<?php

namespace Zix\Blog\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->app->register(AssetsServiceProvider::class);
//        $this->app->register(MenuServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);

        $this->registerLibraries();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register All Core Libraries
     */
    public function registerLibraries()
    {

    }
}
