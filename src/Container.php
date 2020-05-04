<?php


namespace SPS;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;


final class Container
{
    private const CONFIG_FILE_NAME = 'config/services.yml';

    /**
     * @var ContainerBuilder
     */
    private static ?ContainerBuilder $instance = null;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }

    /**
     * @return ContainerBuilder
     */
    private static function getInstance(): ContainerBuilder
    {
        if (self::$instance === null) {
            self::$instance = new ContainerBuilder();
        }

        return self::$instance;
    }

    /**
     * @param string $id
     * @return object|null
     * @throws \Exception
     */
    public static function getService(string $id): ?object
    {
        $loader = new YamlFileLoader(self::getInstance(), new FileLocator(dirname(__DIR__)));
        $loader->load(self::CONFIG_FILE_NAME);

        return self::getInstance()->get($id);
    }
}