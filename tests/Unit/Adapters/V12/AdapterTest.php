<?php

namespace Tests\Unit\Adapters\V12;

use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use JoelButcher\GoogleAds\Adapters\AdapterFactory;
use JoelButcher\GoogleAds\Adapters\AdapterInterface;
use JoelButcher\GoogleAds\ConfigException;
use JoelButcher\GoogleAds\SupportedVersions;
use PHPUnit\Framework\TestCase;
use Tests\Fixtures\HasDefaultConfig;

class AdapterTest extends TestCase
{
    use HasDefaultConfig;

    /**
     * @test
     */
    public function itBuildsForDefaultConfig(): void
    {
        $this->assertInstanceOf(AdapterInterface::class, $this->buildAdapter());
    }

    /**
     * @test
     */
    public function itBuildsExpectedClient(): void
    {
        $this->assertInstanceOf(
            GoogleAdsClient::class,
            $this->buildAdapter()->getClient('refresh-token')
        );
    }

    /**
     * @test
     */
    public function itThrowsForInvalidClientId(): void
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The client ID has not been configured.');
        $this->buildAdapter([]);
    }

    /**
     * @test
     */
    public function itThrowsForInvalidClientSecret(): void
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The client secret has not been configured.');
        $this->buildAdapter(['client-id']);
    }

    /**
     * @test
     */
    public function itThrowsForInvalidDeveloperToken(): void
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('A developer token has not been specified.');
        $this->buildAdapter(['client-id', 'client-secret']);
    }

    /**
     * @test
     */
    public function itThrowsForInvalidTransportProtocol(): void
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('Invalid transport protocol, please use one of "rest" or "grpc".');
        $this->buildAdapter(['client-id', 'client-secret', 'dev-token', 'foo']);
    }

    /**
     * @test
     */
    public function itThrowsForInvalidLogLevel(): void
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('Invalid log level, please use a support PSR log level.');
        $this->buildAdapter(['client-id', 'client-secret', 'dev-token', 'rest', null, 'foo']);
    }

    /**
     * @param  array|null  $config
     * @return AdapterInterface
     */
    protected function buildAdapter(?array $config = null): AdapterInterface
    {
        $factory = new AdapterFactory;

        return $factory->build(
            SupportedVersions::VERSION_12,
            ! is_null($config) ? $config : $this->getDefaultConfig()
        );
    }
}
