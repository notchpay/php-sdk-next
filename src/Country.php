<?php

namespace NotchPay;

class Country extends ApiResource
{
    use ApiOperations\All;
    
    public static function list(): array|object
    {
        return self::staticRequest('GET', 'countries');
    }
}