<?php

use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;
use SimplyDi\DotEnv\DotEnv;
use Tracy\Debugger;

/**
 * The single file containing the code to start the application
 */

// include all path constants
include_once __DIR__ . DIRECTORY_SEPARATOR . 'Paths.php';

// Delegate static file requests back to the PHP built-in webserver
if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}

// composer autoloader
require VENDOR_PATH . 'autoload.php';

// dotenv
(new DotEnv(ROOT_PATH))->load();

// tracy debugger
Debugger::enable(Debugger::DEVELOPMENT);

/**
 * Self-called anonymous function that creates its own scope and keeps the global namespace clean.
 */
(function () {
    /** @var ContainerInterface $container */
    $container = require CONFIG_PATH . 'container.php';

    /** @var Application $app */
    $app = $container->get(Application::class);
    $factory = $container->get(MiddlewareFactory::class);

    // Execute programmatic/declarative middleware pipeline and routing
    // configuration statements
    (require CONFIG_PATH . 'pipeline.php')($app, $factory, $container);
    (require CONFIG_PATH . 'routes.php')($app, $factory, $container);

    $app->run();
})();
