<?php

declare(strict_types=1);

namespace InvoiceApp\Repository\Invoice;

use InvoiceApp\Collection\Invoice as InvoiceCollection;
use InvoiceApp\Entity\Customer;
use InvoiceApp\Entity\Invoice as InvoiceEntity;
use InvoiceApp\ValueObject\Customer\Address;
use InvoiceApp\ValueObject\Customer\Name;
use InvoiceApp\ValueObject\Customer\Uuid as UuidCustomer;
use InvoiceApp\ValueObject\Invoice\TotalPriceTaxIncluded;
use InvoiceApp\ValueObject\Invoice\Uuid;

class InMemory implements Invoice
{
    private $collection;

    public function __construct()
    {
        $invoice = new InvoiceEntity(
            new Uuid(1),
            new Customer(new UuidCustomer(1), new Name('Customer 1'), new Address('Somewhere, SomewhereLand')),
            new TotalPriceTaxIncluded(10.0)
        );
        $this->collection = new InvoiceCollection(...[
            $invoice->identifier() => $invoice,
        ]);
    }

    public function findAll(): InvoiceCollection
    {
        return $this->collection;
    }

    public function find(Uuid $uuid): ?InvoiceEntity
    {
        if (!isset($this->collection[$uuid->toString()])) {
            return null;
        }
        return $this->collection[$uuid->toString()];
    }
}