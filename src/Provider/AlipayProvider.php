<?php

namespace Midea\Api\Provider;

use Midea\Api\Core\Container;
use Midea\Api\Functions\Alipay\AppPayShortcut;
use Midea\Api\Functions\Public\OrderDetail;
use Midea\Api\Interfaces\Provider;

/**
 * Class AlipayProvider
 * @package Midea\Api\Provider
 */
class AlipayProvider implements Provider
{

    /**
     * 服务提供者
     * @param Container $container
     */
    public function serviceProvider(Container $container): void
    {
        $container['app'] = function ($container) {
            return new AppPayShortcut($container, 'trade_pay_alipay');
        };
        $container['search'] = function ($container) {
            return new OrderDetail($container, 'trade_query');
        };
    }
}
