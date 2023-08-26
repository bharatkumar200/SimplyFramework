<?php

declare(strict_types=1);

namespace App\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class HomepageHandlerFactory
{
    public function __invoke(ContainerInterface $container) : HomepageHandler
    {
        return new HomepageHandler($container->get(TemplateRendererInterface::class));
    }
}
