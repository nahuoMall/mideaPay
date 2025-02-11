<?php

namespace Media\Api\Provider;

use Media\Api\Core\Container;
use Media\Api\Functions\Public\OrderDetail;
use Media\Api\Functions\Public\OrderRefund;
use Media\Api\Interfaces\Provider;

/**
 * Class AlipayProvider
 * @package Media\Api\Provider
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
