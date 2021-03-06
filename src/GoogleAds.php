<?php

namespace JoelButcher\GoogleAds;

use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Auth\FetchAuthTokenInterface;

class GoogleAds
{
    use ForwardsCalls;

    /**
     * The underlying GGoogle Ads client instance.
     *
     * @var \Google\Ads\GoogleAds\Lib\V6\GoogleAdsClient|\Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient|null
     */
    private $googleAdsClient = null;

    /**
     * The applications Client ID.
     *
     * @var string
     */
    private $clientId;

    /**
     * The applications Client Secret.
     *
     * @var string
     */
    private $clientSecret;

    /**
     * The applications Developer Token.
     *
     * @var string
     */
    private $developerToken;

    /**
     * The unique ID of the Google Ads manager account to act on behalf of.
     *
     * @var int|null
     */
    private $loginCustomerId;

    /**
     * Create a new Google Ads service instance.
     *
     * @param  array  $config
     * @return void
     */
    public function __construct(array $config)
    {
        $this->clientId = $config['client_id'] ?? null;
        $this->clientSecret = $config['client_secret'] ?? null;
        $this->developerToken = $config['developer_token'] ?? null;
        $this->loginCustomerId = $config['login_customer_id'] ?? null;
    }

    /**
     * Sets the linked customer ID for this client.
     *
     * This header is only required for methods that update the resources of an entity when
     * permissioned via Linked Accounts in the Google Ads UI (AccountLink resource in the Google Ads
     * API). Set this value to the customer ID of the data provider that updates the resources of
     * the specified customer ID. It should be set without dashes, for example: 1234567890 instead
     * of 123-456-7890. Read https://support.google.com/google-ads/answer/7365001 to learn more
     * about Linked Accounts.
     *
     * @param  int|null  $loginCustomerId
     * @return \JoelButcher\GoogleAds\GoogleAds
     */
    public function setLoginCustomerId(?int $loginCustomerId): GoogleAds
    {
        $this->loginCustomerId = $loginCustomerId;

        return $this;
    }

    /**
     * Get the OAuth2 Token builder for created a client builder.
     *
     * @param  string  $refreshToken
     * @return \Google\Auth\FetchAuthTokenInterface
     */
    protected function getTokenBuilder(string $refreshToken): FetchAuthTokenInterface
    {
        return (new OAuth2TokenBuilder())
            ->withClientId($this->clientId)
            ->withClientSecret($this->clientSecret)
            ->withRefreshToken($refreshToken)
            ->build();
    }

    /**
     * Get the Google Ads Client Builder for a given refresh token.
     *
     * @param  string  $refreshToken
     * @return \Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder
     */
    protected function getClientBuilder(string $refreshToken): GoogleAdsClientBuilder
    {
        return (new GoogleAdsClientBuilder())
            ->withOAuth2Credential($this->getTokenBuilder($refreshToken))
            ->withDeveloperToken($this->developerToken);
    }

    /**
     * Build the Google Ads Client needed to make requests to the Google Ads API.
     *
     * @param  string  $refreshToken
     * @param  int|null  $linkedCustomerId
     * @return \Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient
     */
    protected function buildClient(string $refreshToken, ?int $linkedCustomerId = null): GoogleAdsClient
    {
        $this->validateConfig();

        $clientBuilder = $this->getClientBuilder($refreshToken);

        if (is_null($linkedCustomerId)) {
            $clientBuilder->withLoginCustomerId($this->loginCustomerId);
        } else {
            $clientBuilder->withLinkedCustomerId($linkedCustomerId);
        }

        return $clientBuilder->build();
    }

    /**
     * Authorize the given access token and optional linked customer id with the Google Ads service.
     *
     * @param  string  $refreshToken
     * @param  int|null  $linkedCustomerId
     * @return \JoelButcher\GoogleAds\GoogleAds
     */
    public function authorize(string $refreshToken, ?int $linkedCustomerId = null): GoogleAds
    {
        $this->googleAdsClient = $this->buildClient($refreshToken, $linkedCustomerId);

        return $this;
    }

    /**
     * Determine if the services has been authorized.
     *
     * @return bool
     */
    public function isAuthorized(): bool
    {
        return ! is_null($this->googleAdsClient);
    }

    /**
     * Validate that the services has been propertly configured.
     *
     * @return void
     *
     * @throws \JoelButcher\GoogleAds\ConfigException
     */
    private function validateConfig(): void
    {
        if (! $this->clientId) {
            static::throwNewConfigException('The Client ID has not been configured.');
        }

        if (! $this->clientSecret) {
            static::throwNewConfigException('The Client Secret has not been configured.');
        }

        if (! $this->developerToken) {
            static::throwNewConfigException('A Developer Token has not been specified.');
        }

        if (! $this->loginCustomerId) {
            static::throwNewConfigException('A Login Customer ID has not been specified.');
        }

        if (! is_int($this->loginCustomerId)) {
            static::throwNewConfigException('The provided Login Customer ID is not an integer.');
        }
    }

    /**
     * Throws a config exception for the given message.
     *
     * @param string $message
     *
     * @return void
     *
     * @throws \JoelButcher\GoogleAds\ConfigException
     */
    protected static function throwNewConfigException(string $message): void
    {
        throw new ConfigException($message);
    }

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (in_array($method, ['authorize'])) {
            return $this->{$method}(...$parameters);
        }

        if (! $this->isAuthorized()) {
            throw new GoogleAdsException('Google Ads Client has not been authorized, did you forget to call `authorize`?');
        }

        return $this->forwardCallTo($this->googleAdsClient, $method, $parameters);
    }
}
