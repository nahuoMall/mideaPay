<?php

namespace Midea\Api\Core;

use GuzzleHttp\Exception\GuzzleException;
use Midea\Api\Tools\Guzzle;
use Midea\Api\Tools\Sign;
use function Hyperf\Support\make;

/**
 * Class BaseClient
 * @package Midea\Api\Core
 * @property BaseClient app
 */
class BaseClient
{
    use Sign;

    protected Container $app;
    public string $host = 'https://in.mideaepay.com';
    public string $hostTest = 'https://in.mideaepayuat.com';
    public string $url = '/gateway.htm';
    public string $service = '';

    /**
     * BaseClient constructor.
     * @param Container $app
     * @param string $service
     */
    public function __construct(Container $app, string $service)
    {
        $this->app = $app;
        $this->service = $service;
    }

    /**
     * curl 请求
     * @param array $data
     * @param string $method
     * @param int $timeout
     * @return array
     * @throws GuzzleException
     */
    public function curlRequest(array $data, string $method = 'get', int $timeout = 10): array
    {
        ## 公共参数
        $publicParams = [
            'partner' => $this->app->mchId,
            'service' => $this->service,
            'req_seq_no' => uniqid(),
        ];
        ## 合并公共参数
        $data = array_merge($data, $publicParams, $this->app->baseParams);
        ## 加密内容
        $data['sign'] = self::getSign($data);
        ## 开始请求
        /** @var Guzzle $client */
        $client = make(Guzzle::class);
        ## 设置请求参数
        $client->setHttpHandle(
            [
                'base_uri' => $this->hostTest,
                'timeout' => $timeout,
                'verify' => false,
            ]
        );

        $method = 'send' . ucfirst($method);

        return $client->$method($this->url, $data);
    }

}
