<?php

namespace Midea\Api\Provider;

use Midea\Api\Core\Container;
use Midea\Api\Functions\Alipay\AppPayShortcut;
use Midea\Api\Functions\Public\OrderDetail;
use Midea\Api\Functions\Public\OrderRefund;
use Midea\Api\Interfaces\Provider;

/**
 * Class AlipayProvider
 * @package Midea\Api\Provider
 */
class SearchProvider implements Provider
{

    /**
     * 服务提供者
     * @param Container $container
     */
    public function serviceProvider(Container $container): void
    {
        $container['search'] = function ($container) {
            return new OrderDetail($container, 'trade_query');
        };
        $container['refund'] = function ($container) {
            return new OrderRefund($container, 'trade_refund');
        };
    }
}
