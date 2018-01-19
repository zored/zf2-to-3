<?php

namespace ZF2TO3;

use Psr\Container\ContainerInterface;

/**
 * @deprecated Get rid of ServiceLocatorAware.
 */
trait ZF2To3ServiceLocatorAwareTrait
{
    /**
     * @var ContainerInterface
     */
    private $serviceLocator;

    /**
     * @return ContainerInterface
     */
    protected function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    protected function setServiceLocator(ContainerInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }
}
