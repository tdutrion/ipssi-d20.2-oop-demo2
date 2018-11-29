<?php

declare(strict_types=1);

namespace InvoiceApp\DependencyInjection\Factory\Repository;

use InvoiceApp\DependencyInjection\Factory\Factory;
use InvoiceApp\Repository\Invoice\InDatabase as InDatabaseRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class InDatabase implements Factory
{
    public function create(ContainerInterface $container): InDatabaseRepository
    {
        return new InDatabaseRepository($container->get(PDO::class));
    }
}