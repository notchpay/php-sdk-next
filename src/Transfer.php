<?php

namespace NotchPay;

use NotchPay\ApiOperations\Request;
use NotchPay\Exceptions\InvalidArgumentException;

class Transfer extends ApiResource
{
    use Request;

    /**
     * @throws InvalidArgumentException
     */
    public static function direct(array $params): array|object
    {
        self::validateParams($params, true);

        return static::staticRequest('POST', "transfers", $params);
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function verify(string $reference): array|object
    {
        return static::staticRequest('GET', "transfers/{$reference}");
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function list(): array|object
    {
        return self::staticRequest('GET', 'transfers');
    }
}