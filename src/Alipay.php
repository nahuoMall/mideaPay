<?php
namespace Midea\Api;

use Midea\Api\Core\ContainerBase;
use Midea\Api\Functions\Alipay\AppPayShortcut;
use Midea\Api\Functions\Public\OrderClose;
use Midea\Api\Provider\AlipayProvider;

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
        //...其他服务提供者
    ];
}
