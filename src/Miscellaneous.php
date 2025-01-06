<?php

namespace NotchPay;

class Miscellaneous extends ApiResource
{
    use ApiOperations\All;

    public static function ping(): array|object
    {
        return self::staticRequest('GET',"");
    }

    public static function balance(): array|object
    {
        return self::staticRequest('GET',"balance");
    }
}