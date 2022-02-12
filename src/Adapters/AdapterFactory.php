<?php

namespace JoelButcher\GoogleAds\Adapters;

use JoelButcher\GoogleAds\ConfigException;
use JoelButcher\GoogleAds\SupportedVersions;

final class AdapterFactory
{
    /**
     * Build a new Adapter instance for the given SDK version and config array.
     *
     * @param  int  $sdkVersion
     * @param  array  $config
     * @return AdapterInterface
     *
     * @throws ConfigException
     */
    public static function build(int $sdkVersion, array $config = []): AdapterInterface
    {
        switch ($sdkVersion) {
            case SupportedVersions::VERSION_7:
                $adapter = new V7\Adapter(...$config);
                break;
            case SupportedVersions::VERSION_8:
                $adapter = new V8\Adapter(...$config);
                break;
            case SupportedVersions::VERSION_9:
                $adapter = new V9\Adapter(...$config);
                break;
            default:
                throw new \InvalidArgumentException("This Google Ads SDK version ({$sdkVersion}) is not supported");
        }

        return $adapter;
    }
}
