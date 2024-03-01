<?php
namespace Midea\Api;

use Midea\Api\Core\ContainerBase;
use Midea\Api\Functions\Alipay\AppPayShortcut;
use Midea\Api\Functions\Public\OrderClose;
use Midea\Api\Provider\AlipayProvider;
use Midea\Api\Provider\CashierDeskPayProvider;
use Midea\Api\Provider\SearchProvider;

/**
 * Class Application
 */
class Alipay extends ContainerBase
{
    protected AppPayShortcut $app;
    protected OrderClose $close;

    /**
     * 服务提供者
     * @var array
     */
    protected array $provider = [
        AlipayProvider::class,
        SearchProvider::class,
        CashierDeskPayProvider::class
        //...其他服务提供者
    ];
}
