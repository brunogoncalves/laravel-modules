<?php namespace BrunoGoncalves\LaravelModules;

class Register
{
    protected static $modules = [];

    /**
     * Registrar novo módulo.
     *
     * @param $class
     */
    public static function register($class)
    {
        if (! in_array($class, self::$modules)) {
            self::$modules[] = $class;
        }
    }

    /**
     * Retorna a lista de modulos regsitrados.
     * @return array
     */
    public static function all()
    {
        return self::$modules;
    }
}