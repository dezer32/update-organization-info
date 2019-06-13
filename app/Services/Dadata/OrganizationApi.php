<?php


namespace App\Services\Dadata;


use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class OrganizationApi extends BaseApiService
{
    /**
     * @param int $inn
     * @return mixed|ResponseInterface
     * @throws GuzzleException
     */
    public function findByINN(int $inn)
    {
        $method = 'findById/party';
        $data = [
            'query' => $inn
        ];

        return $this->send($method, $data);
    }

    /**
     * @param string $name
     * @return mixed|ResponseInterface
     * @throws GuzzleException
     */
    public function findByName(string $name)
    {
        $method = 'suggest/party';
        $data = [
            'query' => $name
        ];

        return $this->send($method, $data);
    }
}
