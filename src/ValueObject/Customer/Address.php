<?php

declare(strict_types=1);

namespace InvoiceApp\ValueObject\Customer;

final class Address
{
    private $value;

    public function __construct(string $address)
    {
        $addressSegments = explode(', ', $address);
        if (count($addressSegments) < 2) {
            throw new \LogicException('Not using comma to separate segments');
        }
        $this->value = $address;
    }

    public function toString(): string
    {
        return $this->value;
    }
}