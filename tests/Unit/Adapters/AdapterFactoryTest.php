<?php

namespace Tests\Unit\Adapters;

use JoelButcher\GoogleAds\Adapters\AdapterFactory;
use JoelButcher\GoogleAds\Adapters\V10\Adapter as V10Adapter;
use JoelButcher\GoogleAds\Adapters\V11\Adapter as V11Adapter;
use JoelButcher\GoogleAds\SupportedVersions;
use PHPUnit\Framework\TestCase;
use Tests\Fixtures\HasDefaultConfig;

class AdapterFactoryTest extends TestCase
{
    use HasDefaultConfig;

    /**
     * @test
     */
    public function itThrowsForUnsupportedSDKVersion(): void
    {
        $unsupportedVersion = 6;
        $factory = new AdapterFactory;
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('This Google Ads SDK version (6) is not supported');
        $factory->build($unsupportedVersion, $this->getDefaultConfig());
    }

    /**
     * @test
     */
    public function itReturnsExpectedAdapterInstance(): void
    {
        $factory = new AdapterFactory;
        $config = $this->getDefaultConfig();

        $v10Adapter = $factory->build(SupportedVersions::VERSION_10, $config);
        $this->assertInstanceOf(V10Adapter::class, $v10Adapter);

        $v11Adapter = $factory->build(SupportedVersions::VERSION_11, $config);
        $this->assertInstanceOf(V11Adapter::class, $v11Adapter);
    }
}
