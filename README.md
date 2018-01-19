# ZF2 to 3

[![Build Status](https://travis-ci.org/zored/zf2-to-3.svg?branch=master)](https://travis-ci.org/zored/zf2-to-3)
[![Coverage Status](https://coveralls.io/repos/github/zored/zf2-to-3/badge.svg?branch=master)](https://coveralls.io/github/zored/zf2-to-3?branch=master)
[![Latest Stable Version](https://poser.pugx.org/zored/zf2-to-3/v/stable)](https://packagist.org/packages/zored/zf2-to-3)

Hacks for migrating from ZF2 to ZF3.

## Why?
To fast-fix your code before fully moving to ZF3.

## How?
- `use \ZF2TO3\ZF2To3AbstractFactoryTrait;` in abstract factories.
- `use \ZF2TO3\ZF2To3FactoryTrait;` in factories.
- `use \ZF2TO3\ZF2To3ControllerTrait;` in controller itself if it depends on service locator.
- `use \ZF2TO3\ZF2To3ServiceLocatorAwareTrait;` and custom constructor to [get rid of `ServiceLocatorAware`](https://docs.zendframework.com/zend-mvc/migration/to-v3-0/#servicelocatoraware-initializers).
- Change controller configurations:
  ```php
  <?php
  return [
      'controllers' => [
          // BEFORE:
          'invokables' => [
              'App\Some' => \App\SomeController::class
          ],
          
          // AFTER:
          'factories' => [
              // Controller should be real class:
              \App\SomeController::class => \ZF2TO3\ZF2To3ControllerFactory::class
          ],
      ],
  ];
  ```
- Read the [migration docs](https://docs.zendframework.com/zend-mvc/migration/to-v3-0/) and get rid of these hacks!
