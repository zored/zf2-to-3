<?php

namespace ZF2TO3Test\Stub;

use Psr\Container\ContainerInterface;
use ZF2TO3\ZF2To3ServiceLocatorAwareTrait;

final class ServiceLocatorAwareStub
{
    use ZF2To3ServiceLocatorAwareTrait;

    public function __construct(ContainerInterface $serviceLocator)
    {
        $this->setServiceLocator($serviceLocator);
    }

    public function getContainer()
    {
        return $this->getServiceLocator();
    }
}
