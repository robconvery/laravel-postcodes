<?php
/**
 * Class FakePostcodeGateway
 *
 * @package Robconvery\LaravelPostcodes\Gateways
 * @author robconvery <robconvery@me.com>
 */

namespace Robconvery\LaravelPostcodes\Gateways;

use Robconvery\LaravelPostcodes\Interfaces\GatewayInterface;

class FakePostcodeGateway implements GatewayInterface
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return include dirname(dirname(__DIR__)) . '/config/test_data.php';
    }
}
