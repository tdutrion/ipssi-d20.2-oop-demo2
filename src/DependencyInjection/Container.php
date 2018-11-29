<?php

declare(strict_types=1);

namespace InvoiceApp\DependencyInjection;

use InvoiceApp\DependencyInjection\Factory\Factory;
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

        $serviceValue = $this->services[$serviceName];
        if (is_string($serviceValue) && class_exists($serviceValue)) {
            $serviceValue = new $serviceValue();
        }
        if (!is_a($serviceValue, Factory::class)) {
            throw new \LogicException('The factory provided is not a factory.');
        }
        $this->instances[$serviceName] = $serviceValue->create($this);

        return $this->instances[$serviceName];
    }

    public function has($serviceName)
    {
        return isset($this->services[$serviceName]);
    }
}