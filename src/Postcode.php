<?php declare(strict_types=1);
/**
 * Class Postcode
 *
 * @package Robconvery\LaravelPostcodes
 * @author robconvery <robconvery@me.com>
 */

namespace Robconvery\LaravelPostcodes;

use Robconvery\LaravelPostcodes\Interfaces\GatewayInterface;

class Postcode
{
    /**
     * @var array
     */
    protected $data=[];

    /**
     * Postcode constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->data = $data;
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    /**
     * Find postcode details from the postcode
     * @param string $postcode
     * @return Postcode
     */
    public static function getByPostcode(string $postcode): Postcode
    {
        $gateway = app()->make(GatewayInterface::class, [$postcode]);
        return new Postcode($gateway->getData());
    }
}
