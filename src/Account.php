<?php

namespace NotchPay;

use NotchPay\ApiOperations\Request;

class Account extends ApiResource
{
    use Request;
    
    public static function create(array $params): array|object
    {
        self::validateParams($params, true);

        return static::staticRequest('POST', "accounts", $params);
    }

    public static function list()
    {
        return self::staticRequest('GET', "accounts");
    }

    public static function verify(string $reference): array|object
    {
        return static::staticRequest('GET', "accounts/{$reference}");
    }

    public static function getAuthorization(string $reference): array|object
    {
        return static::staticRequest('PATCH', "accounts/{$reference}");
    }
    
}