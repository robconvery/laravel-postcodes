<?php
/**
 * Class PostcodesTest
 *
 * @package Robconvery\LaravelPostcodes\Tests\Unit
 * @author robconvery <robconvery@me.com>
 */

namespace Robconvery\LaravelPostcodes\Tests\Unit;

use Orchestra\Testbench\TestCase;
use Robconvery\LaravelPostcodes\PackageServiceProvider;
use Robconvery\LaravelPostcodes\Postcode;

class PostcodesTest extends TestCase
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
     * @group get_postcode_coordinates
     */
    public function get_postcode_coordinates()
    {
        // Arrange
        $postcode = 'BB18 5QT';

        // Act
        $coordinates = Postcode::getByPostcode($postcode);

        // Assert
        $this->assertEquals('53.911032', $coordinates->latitude);
        $this->assertEquals('-2.187584', $coordinates->longitude);
    }
}
