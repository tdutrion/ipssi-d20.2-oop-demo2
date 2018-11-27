<?php

declare(strict_types=1);

namespace InvoiceApp\ValueObject\Customer;

final class Name
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function toString(): string
    {
        return $this->name;
    }
}