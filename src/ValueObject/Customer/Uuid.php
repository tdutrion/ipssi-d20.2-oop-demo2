<?php

declare(strict_types=1);

namespace InvoiceApp\ValueObject\Customer;

final class Uuid
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function toString(): string
    {
        return (string) $this->id;
    }
}