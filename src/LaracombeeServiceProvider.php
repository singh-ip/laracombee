<?php

namespace Amranidev\Laracombee;

use Amranidev\Laracombee\Laracombee;
use Amranidev\Laracombee\Commands\DefineUserProperties;
use Amranidev\Laracombee\Commands\DeleteUserProperties;
use Amranidev\Laracombee\Commands\DefineItemProperties;
use Illuminate\Support\ServiceProvider;

class LaracombeeServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Laracombee', function () {
            return new Laracombee();
        });

        $this->commands([ DefineUserProperties::class, 
                          DeleteUserProperties::class, 
                          DefineItemProperties::class,
                        ]);

    }

    public function boot()
    {
        $configPath = __DIR__.'/../published/laracombee.php';
        $this->publishes([
            $configPath => config_path('laracombee.php'), ]);
    }
}
