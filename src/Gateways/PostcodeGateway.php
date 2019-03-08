<?php declare(strict_types=1);
/**
 * Class PostcodeGateway
 *
 * @author robconvery <robconvery@me.com>
 */

namespace Robconvery\LaravelPostcodes\Gateways;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Robconvery\LaravelPostcodes\Interfaces\GatewayInterface;

class PostcodeGateway implements GatewayInterface
{
    /**
     * @var string
     */
    private $postcode;

    /**
     * @var string
     */
    private $url='https://api.postcodes.io/postcodes/';

    /**
     * @var array
     */
    private $headers=[
        'content-type' => 'application/json',
        'Accept' => 'application/json'
    ];

    /**
     * PostcodeGateway constructor.
     * @param string $postcode
     */
    public function __construct(string $postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string|null
     */
    private function getPostcode()
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $this->postcode);
    }

    /**
     * @return string
     */
    private function getURI()
    {
        return $this->url . urlencode($this->getPostcode());
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getRequest()
    {
        return (new Client())
            ->request('GET', $this->getURI(), ['headers' => $this->headers]);
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getData(): array
    {
        try {
            $response = $this->getRequest();

            if ($response->getStatusCode() !== 200) {
                throw new \Exception("Invalid status code " . $response->getStatusCode());
            }

            $contentType = current($response->getHeader('Content-Type'));
            if ($contentType !== "application/json; charset=utf-8") {
                throw new \Exception("Invalid content type " . $contentType);
            }

            return json_decode($response->getBody()->getContents(), true)['result'];
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return [];
    }
}
