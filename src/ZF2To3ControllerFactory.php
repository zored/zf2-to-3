<?php

namespace ZF2TO3;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @deprecated Use factory per controller.
 */
class ZF2To3ControllerFactory implements FactoryInterface
{
    use ZF2To3FactoryTrait;

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new $requestedName($container);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        throw new \LogicException('In ZF2 you may only specify factories.');
    }
}
