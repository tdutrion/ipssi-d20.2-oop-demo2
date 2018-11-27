<?php

declare(strict_types=1);

namespace InvoiceApp\Exception\Invoice;

use InvoiceApp\ValueObject\Invoice\Status;
use LogicException;

final class InvalidStatus extends LogicException
{
    public function __construct(string $status)
    {
        parent::__construct(sprintf(
            '%s is not a valid status (valid status = %s).',
            $status,
            sprintf('%s, %s, %s', Status::PAID, Status::SENT, Status::INITIALIZED)
        ));
    }
}