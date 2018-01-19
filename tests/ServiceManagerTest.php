<?php

namespace ZF2TO3Test;

use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;
use ZF2TO3\ZF2To3ControllerFactory;
use ZF2TO3Test\Stub\AbstractFactoryStub;
use ZF2TO3Test\Stub\ControllerStub;
use ZF2TO3Test\Stub\FactoryStub;
use ZF2TO3Test\Stub\ServiceFromAbstractFactoryStub;
use ZF2TO3Test\Stub\ServiceLocatorAwareStub;

final class ServiceManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testRun()
    {
        $config = new Config([
            'factories' => [
                ControllerStub::class => ZF2To3ControllerFactory::class,
                ServiceLocatorAwareStub::class => FactoryStub::class,
            ],
            'abstract_factories' => [
                AbstractFactoryStub::class
            ],
        ]);

        $isZendThree = \method_exists($config, 'toArray');

        $container = new ServiceManager($isZendThree ? $config->toArray() : $config);

        if ($isZendThree) {
            $this->assertInstanceOf(
                ControllerStub::class,
                $container->get(ControllerStub::class)
            );
        }
        else{
            try{
                $container->get(ControllerStub::class);
            } catch (\LogicException $exception) {
            }
            $this->assertTrue(isset($exception));
        }

        $this->assertInstanceOf(
            ServiceFromAbstractFactoryStub::class,
            $container->get(ServiceFromAbstractFactoryStub::class)
        );

        /** @var ServiceLocatorAwareStub $serviceLocatorAwareStub */
        $serviceLocatorAwareStub = $container->get(ServiceLocatorAwareStub::class);
        $this->assertInstanceOf(
            ServiceLocatorAwareStub::class,
            $serviceLocatorAwareStub
        );
        $this->assertSame($container, $serviceLocatorAwareStub->getContainer());
    }
}
