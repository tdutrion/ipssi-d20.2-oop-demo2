<?php

declare(strict_types=1);

namespace InvoiceApp\Collection;

use Countable;
use InvoiceApp\Entity\Invoice as InvoiceEntity;
use Iterator;
use IteratorAggregate;

class Invoice implements IteratorAggregate, Countable
{
    private $invoices;

    public function __construct(InvoiceEntity ...$invoices)
    {
        $this->invoices = $invoices;
    }

    public function getIterator(): Iterator
    {
        return new \ArrayIterator($this->invoices);
    }

    public function count(): int
    {
        return count($this->invoices);
    }
}