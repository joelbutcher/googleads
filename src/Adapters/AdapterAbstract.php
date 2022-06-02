<?php

namespace JoelButcher\GoogleAds\Adapters;

use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V10\GoogleAdsClient as V10Client;
use Google\Ads\GoogleAds\Lib\V10\GoogleAdsClientBuilder as V10ClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient as V8Client;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder as V8ClientBuilder;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClient as V9Client;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClientBuilder as V9ClientBuilder;
use Google\Auth\FetchAuthTokenInterface;
use JoelButcher\GoogleAds\Concerns\ValidatesConfig;
use Psr\Log\LoggerInterface;

abstract class AdapterAbstract implements AdapterInterface
{
    use ValidatesConfig;

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
     * The transport protocol used by the client.
     *
     * @var string
     */
    protected $transportProtocol = 'rest';

    /**
     * The minimum log level we should be logging.
     *
     * @var string
     */
    protected $logLevel = 'info';

    /**
     * The underlying logger implementation.
     *
     * @var LoggerInterface|null
     */
    protected $logger = null;

    /**
     * Create a new adapter instance.
     *
     * @param  string|null  $clientId
     * @param  string|null  $clientSecret
     * @param  string|null  $developerToken
     * @param  string  $transportProtocol
     * @param  LoggerInterface|null  $logger
     * @param  string  $logLevel
     * @return void
     */
    public function __construct(
        ?string $clientId = null,
        ?string $clientSecret = null,
        ?string $developerToken = null,
        string $transportProtocol = 'rest',
        ?LoggerInterface $logger = null,
        string $logLevel = 'info'
    ) {
        $this->validateConfig($clientId, $clientSecret, $developerToken, $transportProtocol, $logLevel);
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->developerToken = $developerToken;
        $this->transportProtocol = $transportProtocol;
        $this->logger = $logger;
        $this->logLevel = strtoupper($logLevel);
    }

    /**
     * Build the Google Ads Client for the supported version.
     *
     * @param  string  $refreshToken
     * @param  int|null  $loginCustomerId
     * @return V8Client|V9Client|V10Client
     */
    public function getClient(string $refreshToken, ?int $loginCustomerId = null)
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
     *
     * @return V8ClientBuilder|V9ClientBuilder|V10ClientBuilder
     */
    abstract protected function getClientBuilder();

    /**
     * Get the OAuth2 Token builder for created a client builder.
     *
     * @param  string  $refreshToken
     * @return FetchAuthTokenInterface
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
