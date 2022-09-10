<?php

use Mar4ehk0\Service\Config;

if (!function_exists('config_get')) {
    function config_get(string $varName): mixed
    {
        return Config::get($varName);
    }
}
