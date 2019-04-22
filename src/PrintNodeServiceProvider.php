<?php

namespace SanderJongsma\PrintNode;

use Illuminate\Support\ServiceProvider;

class PrintNodeServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
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
        $this->mergeConfigFrom(__DIR__.'/../config/printnode.php', 'printnode');

        // Register the service the package provides.
        $this->app->singleton('printnode', function ($app) {
            return new PrintNode;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['printnode'];
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
            __DIR__.'/../config/printnode.php' => config_path('printnode.php'),
        ], 'printnode.config');
    }
}
