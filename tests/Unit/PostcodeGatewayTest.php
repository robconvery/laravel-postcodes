<?php
/**
 * @author robconvery <robconvery@me.com>
 */

namespace Robconvery\LaravelPostcodes\Tests\Unit;

use Orchestra\Testbench\TestCase;
use Robconvery\LaravelPostcodes\Gateways\PostcodeGateway;
use Robconvery\LaravelPostcodes\PackageServiceProvider;

class PostcodeGatewayTest extends TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [PackageServiceProvider::class];
    }

    /**
     * @test
     * @group get_postcode_data
     */
    public function get_postcode_data()
    {
        // Arrange
        $postcode = 'BB18 5QT';
        $gateway = new PostcodeGateway($postcode);

        // Act
        $data = $gateway->getData();

        // Assert
        $this->assertTrue(is_array($data));
        $this->assertNotEmpty($data);
    }
}
