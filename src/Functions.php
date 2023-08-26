<?php

/**
 * This file defines functions that will be used in the application.
 *
 * This file is loaded automatically via composer.
 */

use Core\Service\SettingService;

if (!function_exists('baseUrl')) {
    function baseUrl(string $path = ''): string
    {
        $baseUrl = env("APP_URL", setting("app.url"));
        return $baseUrl . $path;
    }
}

if (!function_exists('setting')) {
    function setting(string $key)
    {
        return (new SettingService())->get($key);
    }
}