<?php

namespace Midea\Api\Functions\Public;

use GuzzleHttp\Exception\GuzzleException;
use Midea\Api\Core\BaseClient;

/**
 * 退款模块
 */
class OrderRefund extends BaseClient
{
    /**
     * 统一退款
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function refund(array $params): array
    {
        $this->app->baseParams['version'] = '3.1.0';
        return $this->curlRequest($params, 'post');
    }
}