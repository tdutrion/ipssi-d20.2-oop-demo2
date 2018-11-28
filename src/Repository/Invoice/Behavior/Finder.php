<?php

declare(strict_types=1);

namespace InvoiceApp\Repository\Invoice\Behavior;

use InvoiceApp\Entity\Invoice;
use InvoiceApp\Exception\CannotRetrieveInvoice;
use InvoiceApp\ValueObject\Invoice\Uuid;

interface Finder
{
    /**
     * @param Uuid $identifier
     * @return Invoice|null
     * @throws CannotRetrieveInvoice
     */
    public function find(Uuid $identifier): ?Invoice;
}