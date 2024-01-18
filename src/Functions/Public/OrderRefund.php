<?php

namespace Midea\Api\Functions\Public;

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
     */
    public function refund(array $params): array
    {
        $params['op_user_id'] = $this->app->mchId;
        return $this->curlRequest($params, 'post');
    }

    /**
     * 统一退款查询
     * @param array $params
     * @return array
     */
    public function find(array $params): array
    {
        ## 设置退款查询服务接口
        $this->service = 'unified.trade.refundquery';
        ## 开始查询
        return $this->curlRequest($params, 'post');
    }
}