<?php namespace BrunoGoncalves\LaravelModules;

use Illuminate\Support\ServiceProvider;

class ModulesProvider extends ServiceProvider
{
    public function register()
    {
        //..
    }

    public function boot()
    {
        foreach (Register::all() as $class) {
            $this->app->register($class);
        }
    }
}