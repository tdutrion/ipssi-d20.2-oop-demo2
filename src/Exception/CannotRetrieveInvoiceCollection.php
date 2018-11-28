<?php

declare(strict_types=1);

namespace InvoiceApp\Exception;

use LogicException;

final class CannotRetrieveInvoiceCollection extends LogicException
{
    public function __construct(\Throwable $previousException)
    {
        parent::__construct('Cannot retrieve invoice collection at the moment', 0, $previousException);
    }
}