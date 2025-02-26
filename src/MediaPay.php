<?php
namespace Media\Api;

use Media\Api\Core\ContainerBase;
use Media\Api\Provider\CashierDeskPayProvider;
use Media\Api\Provider\SearchProvider;
use Media\Api\Provider\WechatPayProvider;

/**
 * Class Application
 */
class MediaPay extends ContainerBase
{
    /**
     * 服务提供者
     * @var array
     */
    protected array $provider = [
        SearchProvider::class,
        CashierDeskPayProvider::class,
        WechatPayProvider::class
        //...其他服务提供者
    ];
}
