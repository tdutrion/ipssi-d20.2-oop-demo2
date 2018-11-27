<?php

declare(strict_types=1);

namespace InvoiceApp\Repository\Invoice\Behavior;

use InvoiceApp\Collection\Invoice;

interface Listing
{
    public function findAll(): Invoice;
}