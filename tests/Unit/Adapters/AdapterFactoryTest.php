<?php

namespace Tests\Unit\Adapters;

use JoelButcher\GoogleAds\Adapters\AdapterFactory;
use JoelButcher\GoogleAds\Adapters\V7\Adapter as V7Adapter;
use JoelButcher\GoogleAds\Adapters\V8\Adapter as V8Adapter;
use JoelButcher\GoogleAds\Adapters\V9\Adapter as V9Adapter;
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

        $v7Adapter = $factory->build(SupportedVersions::VERSION_7, $config);
        $this->assertInstanceOf(V7Adapter::class, $v7Adapter);

        $v8Adapter = $factory->build(SupportedVersions::VERSION_8, $config);
        $this->assertInstanceOf(V8Adapter::class, $v8Adapter);

        $v9Adapter = $factory->build(SupportedVersions::VERSION_9, $config);
        $this->assertInstanceOf(V9Adapter::class, $v9Adapter);
    }
}