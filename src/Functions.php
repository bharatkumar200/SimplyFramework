<?php

/**
 * This file defines functions that will be used in the application.
 * 
 * This file is loaded automatically via composer.
 */

use Core\Service\SettingService;

if (!function_exists('setting'))
{
    function setting(string $key)
    {
        return (new SettingService())->get($key);
    }
}