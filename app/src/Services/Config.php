<?php

namespace Mar4ehk0\Services;

use Dotenv\Dotenv;

class Config
{
    private static ?Config $instance = null;
    private static array $options;

    private function __construct() { }
    private function __clone() { }

    public static function init(string $pathConfig = ''): ?Config
    {

        if (!is_null(self::$instance)) {
            return self::$instance;
        }

        if (empty($pathConfig)) {
            $pathConfig = $_ENV['CONFIG_PATH'];
        }

        self::$instance = new Config();
        self::load($pathConfig);

        return self::$instance;
    }

    public static function get(string $varName): mixed
    {
        return self::$options[$varName] ?? null;
    }

    private static function load(string $pathConfig): void
    {
        try {
            $dotenv = Dotenv::createImmutable($pathConfig);
            self::$options = $dotenv->load();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }


}
