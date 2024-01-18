<?php

namespace Midea\Api\Functions\Alipay;

use GuzzleHttp\Exception\GuzzleException;
use Midea\Api\Core\BaseClient;

/**
 * 订单模块
 */
class AppPayShortcut extends BaseClient
{

    /**
     * 创建订单
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function createOrder(array $params): array
    {
        return $this->curlRequest($params, 'post');
    }


}
