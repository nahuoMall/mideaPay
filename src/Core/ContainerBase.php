<?php

namespace Midea\Api\Core;


/**
 * Class ContainerBase
 * @package Midea\Api\Core
 */
class ContainerBase extends Container
{
    protected array $provider = [];
    public string $mchId = '';
    public string $service = '';
    public array $baseParams = [
        'version' => '3.4.0',
        'input_charset' => 'UTF-8',
        'sign_type' => 'MD5_RSA_TW',
    ];

    /**
     * ContainerBase constructor.
     */
    public function __construct(array $params = [])
    {
        if (!empty($params)) {
            $this->baseParams = $params;
        }

        $providerCallback = function ($provider) {
            $obj = new $provider;
            $this->serviceRegister($obj);
        };

        array_walk($this->provider, $providerCallback);//注册
    }

    /**
     * @param $id
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * @param string $mchId
     * @return ContainerBase
     */
    public function setMchId(string $mchId): static
    {
        $this->mchId = $mchId;
        return $this;
    }


}
