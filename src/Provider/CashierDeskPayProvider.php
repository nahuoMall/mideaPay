<?php

namespace Midea\Api\Provider;

use Midea\Api\Core\Container;
use Midea\Api\Functions\Cashier\CashierPayShortcut;
use Midea\Api\Interfaces\Provider;

/**
 * Class AlipayProvider
 * @package Midea\Api\Provider
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
