<?php

namespace Zix\Core\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(ConsoleServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(EventListenersProvider::class);

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

    private function registerSiteConfig()
    {
        $configs = collect();
        site()->config->map(function($config) use ($configs){
            $configs[$config->key] = $config->value;
        });

        config(['site' => $configs->toArray()]);
    }
}
