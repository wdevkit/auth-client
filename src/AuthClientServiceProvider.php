<?php

namespace Wdevkit\AuthClient;

use Illuminate\Support\ServiceProvider;

class AuthClientServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/auth-client.php' => config_path('auth-client.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../stubs/Http' => app_path('Http'),
            ], 'middleware');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/auth-client.php', 'auth-client');
    }
}
