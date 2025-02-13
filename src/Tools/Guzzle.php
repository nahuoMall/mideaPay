<?php

namespace Media\Api\Tools;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use Hyperf\Codec\Json;
use Media\Api\Constants\MediaErrorCode;
use Hyperf\Guzzle\CoroutineHandler;
use Psr\Http\Message\ResponseInterface;
use Media\Api\Exception\PayException;
use function Hyperf\Support\build_sql;

class Guzzle
{
    private Client $client;

    protected array $headers = [
        'Content-Type' => 'application/x-www-form-urlencoded',
    ];

    /**
     * @param array $options
     * @return $this
     */
    public function setHttpHandle(array $options = []): static
    {
         $options['handler'] = HandlerStack::create(new CoroutineHandler());

        $options['headers'] = $this->headers;

        $this->client = new Client($options);

        return $this;
    }

    /**
     * @throws GuzzleException
     */
    public function sendGet(string $url, array $params): array
    {
        $result = $this->client->get($url, ['query' => $params]);

        return $this->getResult($result);
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function sendPost(string $url, array $params): array
    {
         logger('mideapay')->info('MediaPay POST', ['url' => $url, 'params' => $params]);

        $result = $this->client->post($url, ['form_params' => $params]);

        return $this->getResult($result);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    private function getResult(ResponseInterface $response): array
    {
        $result = $response->getBody()->getContents();
        $statusCode = $response->getStatusCode();

        if(str_contains($result, '{"') && str_contains($result, '"}')) {
            $result = Json::decode($result);

            logger('mideapay')->info('MediaPay POST RESULT', ['result' => $result]);

            if (empty($result) || $statusCode != 200) {
                throw new PayException(MediaErrorCode::ORDER_SERVICE_ERROR, '请求美的支付服务错误');
            }

            if ($result['result_code'] != 1001) {
                throw new PayException(MediaErrorCode::PAY_POST_ERROR, !empty($result['result_info']) && is_string($result['result_info']) ? $result['result_info'] : null);
            }

        } else {

            logger('mideapay')->info('MediaPay POST RESULT', ['result' => $result]);

            return ['result' => $result];
        }

        return $result;
    }

}