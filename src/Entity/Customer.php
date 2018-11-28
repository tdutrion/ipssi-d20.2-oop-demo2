<?php

declare(strict_types=1);

namespace InvoiceApp\Entity;

use InvoiceApp\ValueObject\Customer\Address;
use InvoiceApp\ValueObject\Customer\Name;
use InvoiceApp\ValueObject\Customer\Uuid;

final class Customer
{
    private $identifier;
    private $name;
    private $address;

    public function __construct(Uuid $identifier, Name $name, Address $address)
    {
        $this->identifier = $identifier;
        $this->name = $name;
        $this->address = $address;
    }

    public function identifier(): Uuid
    {
        return $this->identifier;
    }

    public function clientName(): string
    {
        return $this->name->toString();
    }

    public function clientAddress(): Address
    {
        return clone $this->address;
    }
}