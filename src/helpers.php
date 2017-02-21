<?php

if (!function_exists('load_module')) {

    /**
     * Carregar e iniciar modulo.
     *
     * @param $class
     */
    function load_module($class)
    {
        BrunoGoncalves\LaravelModules\ModulesProvider::$modules[] = $class;
    }
}