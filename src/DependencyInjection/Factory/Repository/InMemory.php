<?php

declare(strict_types=1);

namespace InvoiceApp\DependencyInjection\Factory\Repository;

use InvoiceApp\DependencyInjection\Factory\Factory;
use InvoiceApp\Repository\Invoice\InMemory as InMemoryRepository;
use Psr\Container\ContainerInterface;

final class InMemory implements Factory
{
    public function create(ContainerInterface $container): InMemoryRepository
    {
        return new InMemoryRepository();
    }
}