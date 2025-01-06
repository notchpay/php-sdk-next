<?php

namespace NotchPay;

use NotchPay\Exceptions\InvalidArgumentException;

class NotchPay
{
    /** @var string The Notch Pay API key to be used for requests. */
    public static string $apiKey;

    /** @var string | null The Notch Pay API private key to be used for specific requests. */
    public static ?string $apiPrivateKey;

    /** @var string The instance API key, settable once per new instance */
    private $instanceApiKey;

    /** @var string The base URL for the Notch Pay API. */
    public static $apiBase = 'https://api.notchpay.co';

    /**
     * @return string the API key used for requests
     */
    public static function getApiKey(): string
    {
        return self::$apiKey;
    }

    /**
     * @return string the API private key used for requests
     */
    public static function getApiPrivateKey(): string
    {
        return self::$apiPrivateKey;
    }

    /**
     * Sets the API key to be used for requests.
     *
     * @throws InvalidArgumentException
     */
    public static function setApiKey(string $apiKey): void
    {
        self::validateApiKey($apiKey);
        self::$apiKey = $apiKey;
    }

    /**
     * Sets the API key to be used for requests.
     *
     * @throws InvalidArgumentException
     */
    public static function setApiPrivateKey(string $apiPrivateKey): void
    {
        self::validateApiKey($apiPrivateKey);
        self::$apiPrivateKey = $apiPrivateKey;
    }

    /**
     * @throws InvalidArgumentException
     */
    private static function validateApiKey(string $apiKey): void
    {
        $apiKey = trim($apiKey);

        if ($apiKey === '') {
            throw new InvalidArgumentException('API key must be a non-empty string.');
        }

        if (
            !str_starts_with($apiKey, 'b.') &&
            !str_starts_with($apiKey, 'sk.') &&
            !str_starts_with($apiKey, 'sk_test.') &&
            !str_starts_with($apiKey, 'pk.') &&
            !str_starts_with($apiKey, 'pk_test.')
        ) {
            throw new InvalidArgumentException('API key must have a valid signature.');
        }
    }
}