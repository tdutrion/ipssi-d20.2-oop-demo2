<?php

declare(strict_types=1);

namespace InvoiceApp\Entity;

use InvoiceApp\ValueObject\Customer\Address;
use InvoiceApp\ValueObject\Customer\Name;
use InvoiceApp\ValueObject\Customer\Uuid;

final class Customer
{
    private $uuid;
    private $name;
    private $address;

    public function __construct(Uuid $id, Name $name, Address $address)
    {
        $this->uuid = $id;
        $this->name = $name;
        $this->address = $address;
    }

    public function id(): Uuid
    {
        return $this->uuid;
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