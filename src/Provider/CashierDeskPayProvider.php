<?php

namespace Media\Api\Provider;

use Media\Api\Core\Container;
use Media\Api\Functions\Cashier\CashierPayShortcut;
use Media\Api\Interfaces\Provider;

/**
 * Class AlipayProvider
 * @package Media\Api\Provider
 */
class CashierDeskPayProvider implements Provider
{

    /**
     * 服务提供者
     * @param Container $container
     */
    public function serviceProvider(Container $container): void
    {
        $container['cashier_app'] = function ($container) {
            return new CashierPayShortcut($container, 'trade_pay_cashier');
        };
    }
}
