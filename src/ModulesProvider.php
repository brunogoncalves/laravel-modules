<?php namespace LaravelModules;

use Illuminate\Support\ServiceProvider;

class ModulesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->instance('laravel-modules', []);
    }

    public function boot()
    {
        $list = $this->app['laravel-modules'];
        foreach ($list as $class) {
            $this->app->register($class);
        }
    }
}