<?php

namespace Midea\Api\Interfaces;

use Midea\Api\Core\Container;

/**
 * Interface Provider
 * @package JavaReact\AlibabaOpen\interfaces
 */
interface Provider
{
    /**
     * @param Container $container
     * @return void
     */
    public function serviceProvider(Container $container): void;
}
