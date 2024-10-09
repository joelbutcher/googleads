<?php

namespace JoelButcher\GoogleAds\Adapters;

use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient as V15Client;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder as V15ClientBuilder;
use Google\Ads\GoogleAds\Lib\V16\GoogleAdsClient as V16Client;
use Google\Ads\GoogleAds\Lib\V16\GoogleAdsClientBuilder as V16ClientBuilder;
use Google\Auth\FetchAuthTokenInterface;
use JoelButcher\GoogleAds\Concerns\ValidatesConfig;
use Psr\Log\LoggerInterface;

abstract class AdapterAbstract implements AdapterInterface
{
    use ValidatesConfig;

    /**
     * Create a new adapter instance.
     */
    public function __construct(
        private ?string $clientId = null,
        private ?string $clientSecret = null,
        private ?string $developerToken = null,
        protected string $transportProtocol = 'rest',
        protected ?LoggerInterface $logger = null,
        protected string $logLevel = 'info'
    ) {
        $this->validateConfig($clientId, $clientSecret, $developerToken, $transportProtocol, $logLevel);
        $this->logLevel = strtoupper($this->logLevel);
    }

    /**
     * Build the Google Ads Client for the supported version.
     */
    public function getClient(string $refreshToken, ?int $loginCustomerId = null): V15Client|V16Client
    {
        $clientBuilder = $this->getClientBuilder()
            ->withDeveloperToken($this->developerToken)
            ->withOAuth2Credential($this->getTokenBuilder($refreshToken))
            ->withTransport($this->transportProtocol)
            ->withLogLevel($this->logLevel);

        if ($this->logger instanceof LoggerInterface) {
            $clientBuilder->withLogger($this->logger);
        }

        if (! is_null($loginCustomerId)) {
            $clientBuilder->withLoginCustomerId($loginCustomerId);
        }

        return $clientBuilder->build();
    }

    /**
     * Get the client builder used by the SDK adapter version.
     */
    abstract protected function getClientBuilder(): V15ClientBuilder|V16ClientBuilder;

    /**
     * Get the OAuth2 Token builder for created a client builder.
     */
    protected function getTokenBuilder(string $refreshToken): FetchAuthTokenInterface
    {
        return (new OAuth2TokenBuilder())
            ->withClientId($this->clientId)
            ->withClientSecret($this->clientSecret)
            ->withRefreshToken($refreshToken)
            ->build();
    }
}
