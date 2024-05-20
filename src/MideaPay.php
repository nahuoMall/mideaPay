<?php
namespace Midea\Api;

use Midea\Api\Core\ContainerBase;
use Midea\Api\Provider\CashierDeskPayProvider;
use Midea\Api\Provider\SearchProvider;

/**
 * Class Application
 */
class MideaPay extends ContainerBase
{
    /**
     * 服务提供者
     * @var array
     */
    protected array $provider = [
        SearchProvider::class,
        CashierDeskPayProvider::class
        //...其他服务提供者
    ];
}
