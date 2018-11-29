<?php

use InvoiceApp\Action\Invoice\Listing;
use InvoiceApp\DependencyInjection\Factory\Action;
use InvoiceApp\DependencyInjection\Factory\Config;
use InvoiceApp\DependencyInjection\Factory\Pdo;
use InvoiceApp\DependencyInjection\Factory\Repository;
use InvoiceApp\Repository\Invoice\Behavior\Listing as ListingBehavior;
use InvoiceApp\Repository\Invoice\InDatabase;
use InvoiceApp\Repository\Invoice\InMemory;

return [
    Listing::class => Action\Listing::class,
    ListingBehavior::class => Repository\Behavior\Listing::class,
    InMemory::class => Repository\InMemory::class,
    InDatabase::class => Repository\InMemory::class,
    PDO::class => Pdo::class,
    'db.host' => Config\Db\Host::class,
    'db.user' => Config\Db\User::class,
    'db.pass' => Config\Db\Pass::class,
    'db.name' => Config\Db\Name::class,
    'db.config' => Config\Db::class,
];