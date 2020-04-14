<?php

namespace Webkid\LaravelDiagnostic;

use Illuminate\Support\ServiceProvider;
use Webkid\LaravelDiagnostic\Commands\RunDiagnostic;

class LaravelDiagnosticServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'webkid');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'webkid');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laraveldiagnostic.php', 'laraveldiagnostic');

        // Register the service the package provides.
        $this->app->singleton('laraveldiagnostic', function ($app) {
            return new LaravelDiagnostic;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laraveldiagnostic'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laraveldiagnostic.php' => config_path('laraveldiagnostic.php'),
        ], 'laraveldiagnostic.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/webkid'),
        ], 'laraveldiagnostic.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/webkid'),
        ], 'laraveldiagnostic.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/webkid'),
        ], 'laraveldiagnostic.views');*/

        // Registering package commands.
         $this->commands([
             RunDiagnostic::class
         ]);
    }
}
