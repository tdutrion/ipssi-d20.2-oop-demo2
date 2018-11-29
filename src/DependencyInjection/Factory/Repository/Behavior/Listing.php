<?php

declare(strict_types=1);

namespace InvoiceApp\DependencyInjection\Factory\Repository\Behavior;

use InvoiceApp\DependencyInjection\Factory\Factory;
use InvoiceApp\Repository\Invoice\FingerCrossed;
use InvoiceApp\Repository\Invoice\InDatabase;
use InvoiceApp\Repository\Invoice\InMemory;
use PDOException;
use Psr\Container\ContainerInterface;

final class Listing implements Factory
{
    public function create(ContainerInterface $container)
    {
        try {
            // the fingercrossed provides a fallback from db to memory whenever a query is crashing
            return new FingerCrossed(
                $container->get(InDatabase::class),
                $container->get(InMemory::class)
            );
        } catch (PDOException $exception) {
            // fallback whenever the connection to the server is unavailable (ie: wrong host)
            return $container->get(InMemory::class);
        }
    }
}