<?php

namespace Media\Api\Tools;

use Hyperf\Codec\Json;
use Media\Api\Constants\MediaErrorCode;
use Media\Api\Exception\PayException;
use function Hyperf\Config\config;

trait Sign
{

    private string $signHost = '';
    private string $signPath = '/rsa/sign.htm';

    /**
     * 签名
     * @param array $data
     * @return string
     */
    public function getSign(array $data): string
    {
        $this->signHost = config('pay.mideapay.sign_host');
        // 排序字段(升序排序)
        ksort($data);
        // 拼接字符串
        $str = urldecode(http_build_query($data));
        // 生成基础签名
        $sign = md5($str);
        // 请求内部服务获取实际签名
        return $this->getSignServer($sign);
    }

    /**
     * @param string $signKey
     * @return string
     */
    private function getSignServer(string $signKey): string
    {
        $result = $this->sendSignHttp($signKey);

        $result = Json::decode($result);

        // 判定签名结果
        if($result['code'] != 1) {
            throw new PayException(MediaErrorCode::PAY_SIGN_ERROR);
        }

        return $result['sign'];
    }


    private function sendSignHttp(string $signKey)
    {
        // 验证签名
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => http_build_query(['source' => $signKey])
            ]
        ];
        $context = stream_context_create($options);

        return file_get_contents($this->signHost . $this->signPath, false, $context);
    }

    public function sendPayHttp(array $params)
    {
        // 验证签名
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            ]
        ];
        $context = stream_context_create($options);

        return file_get_contents($this->hostTest . $this->url, false, $context);
    }
}