<?php

/**
 * The single file containing the code to start the application
 */

// include all path constants
include_once 'Paths.php.';

// Delegate static file requests back to the PHP built-in webserver
if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}

// composer autoloader
require VENDOR_PATH . 'autoload.php';

// dotenv
(new \SimplyDi\DotEnv(ROOT_PATH))->load();

/**
 * Self-called anonymous function that creates its own scope and keeps the global namespace clean.
 */
(function () {
    /** @var \Psr\Container\ContainerInterface $container */
    $container = require CONFIG_PATH . 'container.php';

    /** @var \Mezzio\Application $app */
    $app = $container->get(\Mezzio\Application::class);
    $factory = $container->get(\Mezzio\MiddlewareFactory::class);

    // Execute programmatic/declarative middleware pipeline and routing
    // configuration statements
    (require CONFIG_PATH . 'pipeline.php')($app, $factory, $container);
    (require CONFIG_PATH . 'routes.php')($app, $factory, $container);

    $app->run();
})();
