<?php

namespace ZF2TO3;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @deprecated Use ZF3 abstract factory notation.
 * @see AbstractFactoryInterface
 */
trait ZF2To3AbstractFactoryTrait
{
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        return $this->canCreateServiceWithName($container, $requestedName, $requestedName);
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createServiceWithName($container, $requestedName, $requestedName);
    }

    abstract public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName);

    abstract public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName);
}
