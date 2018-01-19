<?php

namespace ZF2TO3Test\Stub;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF2TO3\ZF2To3AbstractFactoryTrait;

final class AbstractFactoryStub implements AbstractFactoryInterface
{
    use ZF2To3AbstractFactoryTrait;

    /**
     * {@inheritDoc}
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return $requestedName === ServiceFromAbstractFactoryStub::class;
    }

    /**
     * {@inheritDoc}
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return new ServiceFromAbstractFactoryStub();
    }
}
