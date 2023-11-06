<?php

namespace Tests\Unit\Adapters;

use JoelButcher\GoogleAds\Adapters\AdapterFactory;
use JoelButcher\GoogleAds\Adapters\V13\Adapter as V13Adapter;
use JoelButcher\GoogleAds\Adapters\V14\Adapter as V14Adapter;
use JoelButcher\GoogleAds\Adapters\V15\Adapter as V15Adapter;
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

        $v11Adapter = $factory->build(SupportedVersions::VERSION_13, $config);
        $this->assertInstanceOf(V13Adapter::class, $v11Adapter);

        $v10Adapter = $factory->build(SupportedVersions::VERSION_14, $config);
        $this->assertInstanceOf(V14Adapter::class, $v10Adapter);

        $v10Adapter = $factory->build(SupportedVersions::VERSION_15, $config);
        $this->assertInstanceOf(V15Adapter::class, $v10Adapter);
    }
}
