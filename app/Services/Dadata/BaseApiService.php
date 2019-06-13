<?php


namespace App\Services\Dadata;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

abstract class BaseApiService
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $secretKey;

    /**
     * Базовый url до начала метода
     * e.g. https://suggestions.dadata.ru/suggestions/api/4_1/rs/
     * @var string
     */
    private $baseUrl;

    private $client;

    /**
     * Api constructor.
     * @param string $apiKey
     * @param string $secretKey
     * @param string $baseUrl
     */
    public function __construct(string $baseUrl, string $apiKey, string $secretKey)
    {
        $this->apiKey = $apiKey;
        $this->secretKey = $secretKey;
        $this->baseUrl = $baseUrl;

        $config = [
            'base_uri' => $this->baseUrl
        ];
        $this->client = new Client($config);
    }

    /**
     * @param $method
     * @param $data
     * @return mixed|ResponseInterface
     * @throws GuzzleException
     */
    public function send($method, $data)
    {
        $options = [
            'headers' => $this->getHeader(),
            'body' => json_encode($data)
        ];

        return $this->client->post($method, $options);
    }

    protected function getHeader()
    {
        $header = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Token ' . $this->apiKey
        ];

        return $header;
    }
}
