<?php namespace BrunoGoncalves\LaravelModules;

use Illuminate\Support\Arr;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class Register
{
    protected static $modules = [];

    /**
     * Registrar novo módulo.
     *
     * @param $class
     * @param int $priority
     */
    public static function register($class, $priority = 0)
    {
        if (! in_array($class, self::$modules)) {
            $key = sprintf('%s:%s', $priority, $class);
            self::$modules[$key] = $class;
        }
    }

    /**
     * Retorna a lista de modulos regsitrados.
     * @return array
     */
    public static function all()
    {
        ksort(self::$modules);

        return array_values(self::$modules);
    }

    /**
     * Auto register services.
     * @return void
     */
    public static function autoload()
    {
        // Vendor path
        $dir_base = realpath(__DIR__ . '/../../../');

        $finder = new Finder();
        $finder->files()
            ->ignoreVCS(true)
            ->ignoreDotFiles(false)
            ->name('.autoservice.yml')
            ->exclude('Tests')
            ->exclude('tests')
            ->in($dir_base);

        foreach ($finder as $file) {
            self::autoloadFile($file);
        }
    }

    /**
     * Carregar arquivo.
     * @param SplFileInfo $file
     * @return void
     */
    protected static function autoloadFile(SplFileInfo $file)
    {
        $yml = Yaml::parse(file_get_contents($file->getRealPath()), true);

        $service = Arr::get($yml, 'auto-service');
        $priority = intval(Arr::get($yml, 'priority', 0));
        if (is_null($service)) {
            return;
        }

        $list = Arr::get($yml, 'services', []);
        foreach ($list as $list_class) {
            if (is_string($list_class)) {
                self::register($list_class, $priority);
            }
        }
    }
}