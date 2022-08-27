<?php

namespace JoelButcher\GoogleAds;

use Google\Ads\GoogleAds\Lib\V10\GoogleAdsClient as V10GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V11\GoogleAdsClient as V11GoogleAdsClient;
use JoelButcher\GoogleAds\Adapters\AdapterFactory;
use JoelButcher\GoogleAds\Adapters\AdapterInterface;
use JoelButcher\GoogleAds\Concerns\ValidatesConfig;
use Psr\Log\LoggerInterface;

/**
 * @mixin V10GoogleAdsClient
 * @mixin V11GoogleAdsClient
 */
final class GoogleAds
{
    use ForwardsCalls;
    use ValidatesConfig;

    /**
     * The underlying Google Ads client instance.
     *
     * @var V10GoogleAdsClient|V11GoogleAdsClient|null
     */
    private $googleAdsClient = null;

    /**
     * The adapter used to interact with a given SDK version.
     *
     * @var AdapterInterface|null
     */
    private $adapter = null;

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
     * Create a new Google Ads service instance.
     *
     * @param  string  $clientId
     * @param  string  $clientSecret
     * @param  string  $developerToken
     * @param  int  $sdkVersion
     * @param  string  $transportProtocol
     * @param  string  $logLevel
     * @param  LoggerInterface|null  $logger
     * @return void
     *
     * @throws ConfigException
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        string $developerToken,
        int $sdkVersion = SupportedVersions::VERSION_11,
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

        if (! in_array($sdkVersion, SupportedVersions::getAllVersions())) {
            $this->throwNewConfigException(sprintf(
                'Unsupported version "%s". Exepected one of: "%s".',
                $sdkVersion,
                implode(', ', SupportedVersions::getAllVersions())
            ));
        }

        $this->sdkVersion = $sdkVersion;
    }

    /**
     * Get the adapter for the given SDK Version.
     *
     * @return AdapterInterface
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
     * @param  string  $refreshToken
     * @param  int|null  $loginCustomerId
     * @return GoogleAds
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
     *
     * @return bool
     */
    public function isAuthorized(): bool
    {
        return ! is_null($this->googleAdsClient);
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
