<?php namespace BrunoGoncalves\LaravelModules;

use Illuminate\Support\ServiceProvider;

class ModulesProvider extends ServiceProvider
{
    public function register()
    {
        Register::autoload();
    }

    public function boot()
    {
        // Register services
        foreach (Register::all() as $class) {
            $this->app->register($class);
        }
    }
}