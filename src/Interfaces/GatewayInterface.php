<?php declare(strict_types=1);
/**
 * Interface GatewayInterface
 */

namespace Robconvery\LaravelPostcodes\Interfaces;

interface GatewayInterface
{
    /**
     * @return mixed
     */
    public function getData(): array;
}
