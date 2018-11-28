<?php

declare(strict_types=1);

namespace InvoiceApp\Entity;

use DateTimeImmutable;
use DateTimeInterface;
use InvoiceApp\ValueObject\Invoice\Status;
use InvoiceApp\ValueObject\Invoice\TotalPriceTaxIncluded;
use InvoiceApp\ValueObject\Invoice\Uuid;

final class Invoice
{
    private $identifier;
    private $date;
    private $status;
    private $customer;
    private $total;

    public function __construct(Uuid $identifier, Customer $customer, TotalPriceTaxIncluded $total)
    {
        $this->identifier = $identifier;
        $this->date = new DateTimeImmutable();
        $this->status = new Status(Status::INITIALIZED);
        $this->customer = $customer;
        $this->total = $total;
    }

    public function identifier(): string
    {
        return $this->identifier->toString();
    }

    public function creationDate(): DateTimeInterface
    {
        return $this->date;
    }

    public function status(): string
    {
        return $this->status->toString();
    }

    public function clientName(): string
    {
        return $this->customer->clientName();
    }

    public function clientAddress(): string
    {
        $address = explode(',', $this->customer->clientAddress()->toString());
        return implode(','.PHP_EOL, $address);
    }

    public function total(): string
    {
        return number_format($this->total->toFloat(), 2);
    }
}