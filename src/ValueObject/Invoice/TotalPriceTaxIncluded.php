<?php

declare(strict_types=1);

namespace InvoiceApp\ValueObject\Invoice;

final class TotalPriceTaxIncluded
{
    private $total;

    public function __construct(float $total)
    {
        $this->total = $total;
    }

    public function toFloat(): float
    {
        return $this->total;
    }
}