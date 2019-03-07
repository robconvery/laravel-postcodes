<?php

namespace Robconvery\LaravelPostcodes;

use Illuminate\Support\ServiceProvider;
use Robconvery\LaravelPostcodes\Gateways\PostcodeGateway;
use Robconvery\LaravelPostcodes\Interfaces\GatewayInterface;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind(GatewayInterface::class, function ($app, $params) {
            return new PostcodeGateway(current($params));
        });
    }
}
