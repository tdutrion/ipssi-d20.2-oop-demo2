<?php

declare(strict_types=1);

namespace InvoiceApp\DependencyInjection\Factory;

use Psr\Container\ContainerInterface;

interface Factory
{
    public function create(ContainerInterface $container);
}