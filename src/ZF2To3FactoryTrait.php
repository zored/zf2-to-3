<?php

namespace ZF2TO3;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @deprecated Use ZF3 factory notation.
 * @see FactoryInterface
 */
trait ZF2To3FactoryTrait
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($this->getServiceLocator($container));
    }

    abstract public function createService(ServiceLocatorInterface $serviceLocator);

    private function getServiceLocator(ContainerInterface $container)
    {
        return $container;
    }
}
