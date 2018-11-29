<?php

declare(strict_types=1);

namespace InvoiceApp\DependencyInjection\Factory;

use InvoiceApp\Persistence\DbConnection;
use Psr\Container\ContainerInterface;

final class Pdo implements Factory
{

    public function create(ContainerInterface $container): DbConnection
    {
        return new DbConnection(
            $container->get('db.host'),
            $container->get('db.user'),
            $container->get('db.pass'),
            $container->get('db.name')
        );
    }
}
