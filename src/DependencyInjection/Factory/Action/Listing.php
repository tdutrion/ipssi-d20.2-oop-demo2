<?php

declare(strict_types=1);

namespace InvoiceApp\DependencyInjection\Factory\Action;

use InvoiceApp\Action\Invoice\Listing as ListingAction;
use InvoiceApp\DependencyInjection\Factory\Factory;
use InvoiceApp\Repository\Invoice\Behavior\Listing as ListingBehavior;
use Psr\Container\ContainerInterface;

final class Listing implements Factory
{
    public function create(ContainerInterface $container)
    {
        return new ListingAction(
            $container->get(ListingBehavior::class)
        );
    }
}