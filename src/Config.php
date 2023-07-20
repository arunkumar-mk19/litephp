<?php

declare(strict_types=1);

namespace LitePHP;

use Psr\Cache\CacheItemInterface;

class Config implements CacheItemInterface
{
    private static $configCache = [];
    
    public static function hasConfig(string $key): bool
    {
        return isset(self::$configCache[$key]);
    }

    public static function get($key, $defaultValue = null)
    {
        // Check if the configuration value is already cached
        if (isset(self::$configCache[$key])) {
            return self::$configCache[$key];
        }

        // Load the configuration file if it exists
        $filePath = __DIR__ . '/config/' . $key . '.php';
        if (file_exists($filePath)) {
            $configData = require($filePath);

            // Cache the configuration value
            self::$configCache[$key] = $configData;

            return $configData;
        }

        // Return the default value if the configuration file doesn't exist
        return $defaultValue;
    }

    public static function set($key, $value)
    {
        // Cache the configuration value
        self::$configCache[$key] = $value;
    }
}
