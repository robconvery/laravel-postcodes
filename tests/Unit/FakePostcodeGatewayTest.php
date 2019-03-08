<?php
/**
 * Class FakePostcodeGatewayTest
 *
 * @package Robconvery\LaravelPostcodes\Tests\Unit
 * @author robconvery <robconvery@me.com>
 */

namespace Robconvery\LaravelPostcodes\Tests\Unit;

use Orchestra\Testbench\TestCase;
use Robconvery\LaravelPostcodes\Gateways\FakePostcodeGateway;

class FakePostcodeGatewayTest extends TestCase
{
    /**
     * @test
     * @group get_fake_postcode_data
     */
    public function get_fake_postcode_data()
    {
        // Arrange
        $postcode = 'BB18 5QT';
        $gateway = new FakePostcodeGateway($postcode);

        // Act
        $data = $gateway->getData();

        // Assert
        $this->assertTrue(is_array($data));
        $this->assertEquals($postcode, current($data));

    }
}
