<?php

namespace NotchPay;

class Currency extends ApiResource
{
    use ApiOperations\All;

    public static function list(): array|object
    {
        return self::staticRequest('GET', 'currencies');
    }
}