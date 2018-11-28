<?php

declare(strict_types=1);

namespace InvoiceApp\ValueObject\Customer;

final class Uuid
{
    private $identifier;

    public function __construct(int $identifier)
    {
        $this->identifier = $identifier;
    }

    public function toString(): string
    {
        return (string) $this->identifier;
    }
}