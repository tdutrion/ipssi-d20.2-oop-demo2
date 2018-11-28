<?php

use InvoiceApp\Action\Invoice\Listing;
use InvoiceApp\Persistence\DbConnection;
use InvoiceApp\Repository\Invoice\Behavior\Listing as ListingBehavior;
use InvoiceApp\Repository\Invoice\FingerCrossed;
use InvoiceApp\Repository\Invoice\InDatabase;
use InvoiceApp\Repository\Invoice\InMemory;
use Psr\Container\ContainerInterface;

return [
    Listing::class => function (ContainerInterface $container) {
        return new Listing(
            $container->get(ListingBehavior::class)
        );
    },
    ListingBehavior::class => function (ContainerInterface $container) {
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
    },
    InMemory::class => function () {
        return new InMemory();
    },
    InDatabase::class => function (ContainerInterface $container) {
        return new InDatabase($container->get(PDO::class));
    },
    PDO::class => function (ContainerInterface $container) {
        return new DbConnection(
            $container->get('db.host'),
            $container->get('db.user'),
            $container->get('db.pass'),
            $container->get('db.name')
        );
    },
    'db.host' => function() { return '127.0.0.1'; },
    'db.user' => function() { return 'root'; },
    'db.pass' => function() { return 'root'; },
    'db.name' => function() { return 'invoiceapp'; },
];