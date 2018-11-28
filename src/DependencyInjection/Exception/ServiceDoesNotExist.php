<?php

declare(strict_types=1);

namespace InvoiceApp\Exception\DependencyInjection;

use LogicException;

final class ServiceDoesNotExist extends LogicException
{
    public function __construct(string $serviceName)
    {
        parent::__construct(sprintf(
            'The service %s is not registered in the dependency injection container',
            $serviceName
        ));
    }
}