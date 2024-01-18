<?php

namespace Midea\Api\Functions\Public;

use Midea\Api\Core\BaseClient;

/**
 * 关闭模块
 */
class OrderClose extends BaseClient
{
    /**
     * 统一关闭订单
     * @param array $params
     * @return array
     */
    public function closeOrder(array $params): array
    {
        return $this->curlRequest($params, 'post');
    }
}