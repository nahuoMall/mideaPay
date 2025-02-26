<?php

namespace Media\Api\Provider;

use Media\Api\Core\Container;
use Media\Api\Functions\Wechat\WechatPayShortcut;
use Media\Api\Interfaces\Provider;

/**
 * Class WechatPayProvider
 * @package Media\Api\Provider
 */
class WechatPayProvider implements Provider
{

    /**
     * 服务提供者
     * @param Container $container
     */
    public function serviceProvider(Container $container): void
    {
        $container['wechat_mini'] = function ($container) {
            return new WechatPayShortcut($container, 'trade_pay_wechatpay');
        };
    }
}
