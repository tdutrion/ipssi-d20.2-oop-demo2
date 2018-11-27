<?php

declare(strict_types=1);

namespace InvoiceApp\Repository\Invoice\Behavior;

use InvoiceApp\Entity\Invoice;
use InvoiceApp\ValueObject\Invoice\Uuid;

interface Finder
{
    public function find(Uuid $uuid): ?Invoice;
}