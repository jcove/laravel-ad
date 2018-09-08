<?php

namespace Jcove\Ad;

use Illuminate\Support\ServiceProvider;


class AdServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (file_exists($routes = __DIR__.'/routes.php')) {
            $this->loadRoutesFrom($routes);
        }
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config' => config_path()],'laravel-ad-config');
            $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang')], 'laravel-ad-lang');
            $this->publishes([__DIR__.'/../database/migrations' => database_path('migrations')], 'laravel-ad-migrations');

        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ad', function ($app) {
            return new Advertisement($app['session'], $app['config']);
        });
    }
}
