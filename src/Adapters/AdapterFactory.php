<?php

namespace JoelButcher\GoogleAds\Adapters;

use JoelButcher\GoogleAds\SupportedVersions;
use ReflectionClass;

final class AdapterFactory
{
    /**
     * Build a new Adapter instance for the given SDK version and config array.
     */
    public static function build(int $sdkVersion, array $config = []): AdapterInterface
    {
        $constants = (new ReflectionClass(SupportedVersions::class))->getConstants();

        if (! in_array($sdkVersion, $constants)) {
            throw new \InvalidArgumentException("This Google Ads SDK version ({$sdkVersion}) is not supported");
        }

        $className = __NAMESPACE__."\V{$sdkVersion}\Adapter";

        return new $className(...$config);
    }
}
