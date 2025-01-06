<?php

namespace NotchPay;

class Customer extends ApiResource
{
    const OBJECT_NAME = 'customers';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    public function create(array $params): array|object
    {
        self::validateParams($params, true);

        return static::staticRequest('POST', "customers", $params);
    }

    public static function list()
    {
        return self::staticRequest('GET', "customers");
    }

    public static function verify(string $reference): array|object
    {
        return static::staticRequest('GET', "customers/{$reference}");
    }

    public static function update(string $reference, array $params): array|object
    {
        return static::staticRequest('POST', "customers/{$reference}", $params);
    }

    public static function paymentMethods(string $reference): array|object
    {
        return static::staticRequest('GET', "customers/{$reference}/payment_methods");
    }

    /**
     * @param string $customerId containing the id of the customer to block
     *
     * @link https://developer.notchpay.co/#customer-whitelist-blacklist
     */
    public static function block(string $customerId): array|object
    {
        $url = static::classUrl().'/'.$customerId.'/block';

        return static::staticRequest('PUT', $url);
    }

    /**
     * @param string $customerId containing the id of the customer to unblock
     *
     * @link https://developer.notchpay.co/#customer-whitelist-blacklist
     */
    public static function unblock(string $customerId): array|object
    {
        $url = static::classUrl().'/'.$customerId.'/unblock';

        return static::staticRequest('PUT', $url);
    }

    /**
     * @param string $customerId containing the id of the customer to delete
     *
     * @link https://developer.notchpay.co/#customer-whitelist-blacklist
     */
    public static function delete(string $customerId): array|object
    {
        $url = static::classUrl().'/'.$customerId;

        return static::staticRequest('delete', $url);
    }
}