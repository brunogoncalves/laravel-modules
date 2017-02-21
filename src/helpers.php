<?php

if (!function_exists('load_module')) {

    /**
     * Carregar e iniciar modulo.
     *
     * @param $class
     */
    function load_module($class)
    {
        $list = app('laravel-modules');
        $list[] = $class;

        app()->instance('laravel-modules', $list);
    }
}