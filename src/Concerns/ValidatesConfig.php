<?php

namespace JoelButcher\GoogleAds\Concerns;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

trait ValidatesConfig
{
    use ThrowsConfigException;

    /**
     * Validate the given config items.
     *
     * @param  string|null  $clientId
     * @param  string|null  $clientSecret
     * @param  string|null  $developerToken
     * @param  string  $transportProtocol
     * @param  LoggerInterface|null  $logger
     * @param  string  $logLevel
     * @return void
     */
    protected static function validateConfig(
        ?string $clientId = null,
        ?string $clientSecret = null,
        ?string $developerToken = null,
        string $transportProtocol = 'rest',
        string $logLevel = 'info'
    ): void {
        if (! $clientId) {
            static::throwNewConfigException('The client ID has not been configured.');
        }

        if (! $clientSecret) {
            static::throwNewConfigException('The client secret has not been configured.');
        }

        if (! $developerToken) {
            static::throwNewConfigException('A developer token has not been specified.');
        }

        if (! in_array($transportProtocol, ['rest', 'grpc'])) {
            static::throwNewConfigException('Invalid transport protocol, please use one of "rest" or "grpc".');
        }

        if (! in_array(strtolower($logLevel), [
            LogLevel::EMERGENCY, LogLevel::ALERT, LogLevel::CRITICAL, LogLevel::ERROR,
            LogLevel::WARNING, LogLevel::NOTICE, LogLevel::INFO, LogLevel::DEBUG, ]
        )) {
            static::throwNewConfigException('Invalid log level, please use a support PSR log level.');
        }
    }
}
