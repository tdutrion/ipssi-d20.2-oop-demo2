<?php

declare(strict_types=1);

namespace InvoiceApp\ValueObject\Invoice;

use InvoiceApp\Exception\Invoice\InvalidStatus;

final class Status
{
    public const INITIALIZED = 'initialized';
    public const SENT = 'sent';
    public const PAID = 'paid';

    private $value;

    public function __construct(string $status)
    {
        if (
            $status !== self::INITIALIZED &&
            $status !== self::SENT &&
            $status !== self::PAID
        ) {
            throw new InvalidStatus($status);
        }
        $this->value = $status;
    }

    public function toString(): string
    {
        return $this->value;
    }
}