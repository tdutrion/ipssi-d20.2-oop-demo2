<?php

declare(strict_types=1);

namespace InvoiceApp\Repository\Invoice\Behavior;

use InvoiceApp\Collection\Invoice;
use InvoiceApp\Exception\CannotRetrieveInvoiceCollection;

interface Listing
{
    /**
     * @return Invoice
     * @throws CannotRetrieveInvoiceCollection
     */
    public function findAll(): Invoice;
}