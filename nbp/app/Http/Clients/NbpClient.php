<?php


namespace App\Http\Clients;

use App\Http\Interfaces\NbpClientInterface;
use Illuminate\Http\Client\Factory as HttpClient;

class NbpClient implements NbpClientInterface
{
    private const NBP_API_URL = 'http://api.nbp.pl/';

    public function __construct(private HttpClient $httpClient)
    {}

    public function sendGet(string $endpoint, array $query = []): ?array
    {
        return $this->createGetRequest($endpoint, $query);
    }

    private function createGetRequest(string $endpoint, array $query = []): ?array
    {
        return $this->httpClient->get(
            $this->createPath($endpoint),
            $query
        )->json();
    }

    private function createPath(string $endpoint): string
    {
        return self::NBP_API_URL . $endpoint;
    }
}
