<?php

namespace JoelButcher\GoogleAds;

use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient as V12GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClient as V13GoogleAdsClient;
use JoelButcher\GoogleAds\Adapters\AdapterFactory;
use JoelButcher\GoogleAds\Adapters\AdapterInterface;
use JoelButcher\GoogleAds\Concerns\ValidatesConfig;
use Psr\Log\LoggerInterface;

/**
 * @mixin V12GoogleAdsClient
 * @mixin V13GoogleAdsClient
 */
final class GoogleAds
{
    use ForwardsCalls;
    use ValidatesConfig;

    /**
     * The underlying Google Ads client instance.
     */
    private V12GoogleAdsClient|V13GoogleAdsClient|null $googleAdsClient = null;

    /**
     * The adapter used to interact with a given SDK version.
     */
    private ?AdapterInterface $adapter = null;

    public function __construct(
        private string $clientId,
        private string $clientSecret,
        private string $developerToken,
        private int $sdkVersion = SupportedVersions::VERSION_13,
        private string $transportProtocol = 'rest',
        private ?LoggerInterface $logger = null,
        private string $logLevel = 'INFO'
    ) {
        $this->validateConfig($clientId, $clientSecret, $developerToken, $transportProtocol, $logLevel);
        $this->logLevel = strtoupper($this->logLevel);

        if (! in_array($sdkVersion, SupportedVersions::getAllVersions())) {
            $this->throwNewConfigException(sprintf(
                'Unsupported version "%s". Expected one of: "%s".',
                $sdkVersion,
                implode(', ', SupportedVersions::getAllVersions())
            ));
        }
    }

    /**
     * Get the adapter for the given SDK Version.
     *
     * @throws ConfigException
     */
    protected function getAdapter(): AdapterInterface
    {
        if (is_null($this->adapter)) {
            $this->adapter = AdapterFactory::build($this->sdkVersion, [
                $this->clientId,
                $this->clientSecret,
                $this->developerToken,
                $this->transportProtocol,
                $this->logger,
                $this->logLevel,
            ]);
        }

        return $this->adapter;
    }

    /**
     * Authorize the given access token and optional linked customer id with the Google Ads service.
     *
     * @throws ConfigException
     */
    public function authorize(string $refreshToken, ?int $loginCustomerId = null): GoogleAds
    {
        $this->googleAdsClient = $this->getAdapter()->getClient($refreshToken, $loginCustomerId);

        return $this;
    }

    /**
     * Determine if the services has been authorized.
     */
    public function isAuthorized(): bool
    {
        return ! is_null($this->googleAdsClient);
    }

    /**
     * Handle dynamic method calls into the model.
     */
    public function __call(string $method, array $parameters): mixed
    {
        if ($method == 'authorize') {
            return $this->{$method}(...$parameters);
        }

        if (! $this->isAuthorized()) {
            throw new GoogleAdsException('Google Ads Client has not been authorized, did you forget to call `authorize`?');
        }

        return $this->forwardCallTo($this->googleAdsClient, $method, $parameters);
    }
}
