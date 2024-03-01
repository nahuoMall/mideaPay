<?php

namespace Midea\Api\Functions\Cashier;

use GuzzleHttp\Exception\GuzzleException;
use Midea\Api\Core\BaseClient;

/**
 * 订单模块
 */
class CashierPayShortcut extends BaseClient
{

    /**
     * 创建订单
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function createOrder(array $params): array
    {
        // 请求token
        $imei = uniqid();
        $loginName = '131' . rand(1, 9) . '22' . rand(1, 9) . '5249';
        $time = date('YmdHis');
        $params['token'] = $this->getToken($time, $imei, $loginName);
        $params['token_time'] = $time;
        $params['terminal_type'] = 'MOBILE';
        $params['payer_login_name'] = $loginName;
        $params['session_id'] = $imei;

        $this->service = 'trade_pay_cashier';

        return $this->curlRequest($params, 'post');
    }


}
