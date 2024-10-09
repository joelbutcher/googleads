<?php

namespace Tests\Unit\Adapters;

use JoelButcher\GoogleAds\Adapters\AdapterFactory;
use JoelButcher\GoogleAds\Adapters\V16\Adapter as V16Adapter;
use JoelButcher\GoogleAds\Adapters\V17\Adapter as V17Adapter;
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
     * @dataProvider sdkVersionDataProvider
     */
    public function itReturnsExpectedAdapterInstance(int $version, string $expectedAdapterClass): void
    {
        $factory = new AdapterFactory;
        $config = $this->getDefaultConfig();

        $adapter = $factory->build($version, $config);
        $this->assertInstanceOf($expectedAdapterClass, $adapter);
    }

    public static function sdkVersionDataProvider(): array
    {
        return [
            [SupportedVersions::VERSION_16, V16Adapter::class],
            [SupportedVersions::VERSION_17, V17Adapter::class],
        ];
    }
}
