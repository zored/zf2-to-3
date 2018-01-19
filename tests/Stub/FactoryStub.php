<?php

namespace ZF2TO3Test\Stub;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF2TO3\ZF2To3FactoryTrait;

final class FactoryStub implements FactoryInterface
{
    use ZF2To3FactoryTrait;

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ServiceLocatorAwareStub($serviceLocator);
    }
}
