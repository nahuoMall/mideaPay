<?php
/**
 * Created by PhpStorm.
 * User: stbz
 * Date: 2020/6/17
 * Time: 4:00 PM
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Media\Api\MediaPay;
use function Hyperf\Support\make;

$mchId = "1010116442";
$appSecret = "e1cf0ddcf6b47b59c351565d8ad717af";

// 下单接口
$param = [
    'notify_url' => 'http://127.0.0.1:9001/javak/sds?123&23=3',
    'is_guarantee' => 'FALSE',
    'out_trade_no' => 'test-' . date('Y-m-d-H:i:s'),
    'out_trade_time' => date('YmdHis'),
    'bar_code' => 'APP',
    'pay_amount' => 100,
    'is_virtual_product' => 'TRUE',
    'product_name' => 'test product',
    'product_info' => 'test product info',
    'risk_params' => '{"device_version":"Mi-4c","imei":"355065053311001","cpu_info":"A5","mac":"00-50-56-C0-00-08","ip":"10.16.74.58"}'
];

/** @var MediaPay $alipayClient */
$alipayClient = make(MediaPay::class);

## 初始化配置
$alipayClient->setMchId($mchId);

$response = $alipayClient->app->createOrder($param);


var_dump($response);exit();
//订单详情
//$param = [];
//$sn = "20191115204845294762_6_1_1";//三级订单号
//$response = $xrtClient->app->createOrder($sn)->get();

//物流查询
//$param = [
//	'orderSn'=>'20200610111116', //商城订单号
//	'sku'=>4339236
//];
//
//$response = $supplyClient->order->setApi("/v2/logistic")->get();

//物流查询
//$param = [];
//$response = $supplyClient->order->setApi("/v2/logistic/firms")->get();

//var_dump($response);