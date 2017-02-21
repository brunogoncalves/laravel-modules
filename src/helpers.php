<?php

if (!function_exists('modules')) {

    /**
     * @param $class
     */
    function modules($class)
    {
        $list = app('laravel-modules');
        $list[] = $class;

        app()->instance('laravel-modules', $list);
    }
}