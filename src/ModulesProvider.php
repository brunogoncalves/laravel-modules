<?php namespace LaravelModules;

use Illuminate\Support\ServiceProvider;

class ModulesProvider extends ServiceProvider
{
    public static $modules = [];

    public function register()
    {
        $this->app->instance('laravel-modules', []);
    }

    public function boot()
    {
        foreach (self::$modules as $class) {
            $this->app->register($class);
        }
    }
}