---
title: Routing in SimplyDi Framework
description: This doc will help you to understand how to use routing in SimplyDi Framework
---

Before reading any further, you should be aware of the fact that SimplyDi Framework is based
on [Mezzio Middleware Framework (previously known as Zend Expressive)](https://mezzio.dev).

SimplyDi uses [FastRoute](https://github.com/nickic/FastRoute) for routing.

Had you installed Mezzio directly, you had the option of use other routing libraries like Laminas Router or Aura Router.

If you want to use other routing libraries, please refer
to [Mezzio Routing Docs here](https://docs.mezzio.dev/mezzio/v3/features/router/intro/).

## Routing in SimplyDi

Routing in SimplyDi is very simple.

You have two options to define routes:

1. **Use yaml files** (explained below)
2. Use `routes.php` file in config folder (explained below)

### Using yaml files

Even in this case, you have two options:

#### OPTION 1

Create a `routes.yaml` file in `config/settings` folder and define all your routes there.

```yaml
routes:
  - uri: /
    handler: App\Handler\HomepageHandler
    methods:
      - get
    name: home
  - uri: /api/ping
    handler: App\Handler\PingHandler
    methods:
      - get
    name: api.ping
```

#### OPTION 2

Create individual `routes.yaml` files for each module in their respective folders. Example, routes of Auth module will
remain in `src/Auth/routes.yaml` file, while routes of Blog module will remain in `src/Blog/routes.yaml` file.

The content of `routes.yaml` file will be same as above.

### Using `routes.php` file

In the config folder there is a `routes.php` file. You can define all your routes there.

```php

return static function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) use ($routesArr): void {
    foreach ($routesArr as $route) {
        $app->route($route["uri"], $route["handler"], $route["methods"], $route["name"]);
    } // <-- do not remove this foreach code unless you have no intention of using yaml files for routes

    // if you do not prefer to create routes via yaml files, you can create routes here
    // e.g. $app->get('/', App\Handler\HomePageHandler::class, 'home'); <-- define your routes here
};


```