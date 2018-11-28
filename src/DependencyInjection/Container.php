<?php

declare(strict_types=1);

namespace InvoiceApp\DependencyInjection;

use InvoiceApp\Exception\DependencyInjection\ServiceDoesNotExist;
use Psr\Container\ContainerInterface;

final class Container implements ContainerInterface
{
    private $services = [];
    private $instances = [];

    public function __construct(array $services)
    {
        $this->services = $services;
    }

    public function get($serviceName)
    {
        if (!$this->has($serviceName)) {
            throw new ServiceDoesNotExist($serviceName);
        }

        if (isset($this->instances[$serviceName])) {
            return $this->instances[$serviceName];
        }

        $this->instances[$serviceName] = $this->services[$serviceName]($this);

        return $this->instances[$serviceName];
    }

    public function has($serviceName)
    {
        return isset($this->services[$serviceName]);
    }
}