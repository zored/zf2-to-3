<?php

namespace ZF2TO3;

use Psr\Container\ContainerInterface;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * @deprecated Use specific services in constructor.
 * @see InvokableFactory
 */
trait ZF2To3ControllerTrait
{
    /**
     * @var ContainerInterface
     */
    protected $serviceLocator;

    public function __construct(ContainerInterface $container)
    {
        $this->serviceLocator = $container;
    }

    protected function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}
