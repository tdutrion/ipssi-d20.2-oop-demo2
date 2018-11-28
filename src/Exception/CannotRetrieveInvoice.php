<?php

declare(strict_types=1);

namespace InvoiceApp\Exception;

use InvoiceApp\ValueObject\Invoice\Uuid;
use LogicException;
use Throwable;

final class CannotRetrieveInvoice extends LogicException
{
    public function __construct(Uuid $identifier, Throwable $previousException)
    {
        parent::__construct(
            sprintf('Cannot retrieve invoice %s at the moment', $identifier->toString()),
            0,
            $previousException
        );
    }
}