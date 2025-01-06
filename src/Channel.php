<?php

namespace NotchPay;

use NotchPay\Exceptions\InvalidArgumentException;

class Channel extends ApiResource
{
    use ApiOperations\All;

    /**
     * @throws InvalidArgumentException
     */
    public static function list(): array|object
    {
        return self::staticRequest('GET', 'channels');
    }
}