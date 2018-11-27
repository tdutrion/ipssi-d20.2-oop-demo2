<?php

declare(strict_types=1);

namespace InvoiceApp\ValueObject\Invoice;

final class Uuid
{
    private $uuid;

    public function __construct(int $id)
    {
        $this->uuid = $id;
    }

    public function toString(): string
    {
        return (string) $this->uuid;
    }
}