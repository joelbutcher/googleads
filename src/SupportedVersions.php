<?php

namespace JoelButcher\GoogleAds;

final class SupportedVersions
{
    public const VERSION_10 = 10;
    public const VERSION_11 = 11;

    /**
     * Get the list of all supported version.
     *
     * @return array<array-key, int>
     */
    public static function getAllVersions(): array
    {
        return [
            self::VERSION_10,
            self::VERSION_11,
        ];
    }
}
