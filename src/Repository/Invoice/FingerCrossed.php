<?php

declare(strict_types=1);

namespace InvoiceApp\Repository\Invoice;

use InvoiceApp\Collection\Invoice as InvoiceCollection;
use InvoiceApp\Entity\Invoice as InvoiceEntity;
use InvoiceApp\Exception\CannotRetrieveInvoice;
use InvoiceApp\Exception\CannotRetrieveInvoiceCollection;
use InvoiceApp\ValueObject\Invoice\Uuid;

final class FingerCrossed implements Invoice
{
    private $implementation;
    private $fallback;

    public function __construct(Invoice $implementation, Invoice $fallback)
    {
        $this->implementation = $implementation;
        $this->fallback = $fallback;
    }

    public function find(Uuid $identifier): ?InvoiceEntity
    {
        try {
            return $this->implementation->find($identifier);
        } catch (CannotRetrieveInvoice $exception) {
            return $this->fallback->find($identifier);
        }
    }

    public function findAll(): InvoiceCollection
    {
        try {
            return $this->implementation->findAll();
        } catch (CannotRetrieveInvoiceCollection $exception) {
            return $this->fallback->findAll();
        }
    }
}