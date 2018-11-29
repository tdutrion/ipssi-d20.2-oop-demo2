<?php

declare(strict_types=1);

namespace InvoiceApp\DependencyInjection\Factory\Config\Db;

use InvoiceApp\DependencyInjection\Factory\Factory;
use Psr\Container\ContainerInterface;

final class Host implements Factory
{
    public function create(ContainerInterface $container): string
    {
        return $container->get('db.config')->host();
    }
}