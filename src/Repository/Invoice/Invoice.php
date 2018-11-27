<?php

declare(strict_types=1);

namespace InvoiceApp\Repository\Invoice;

use InvoiceApp\Repository\Invoice\Behavior\Finder;
use InvoiceApp\Repository\Invoice\Behavior\Listing;

interface Invoice extends Listing, Finder
{

}