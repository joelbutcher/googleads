<?php

namespace JoelButcher\GoogleAds;

final class SupportedVersions
{
    public const VERSION_8 = 8;
    public const VERSION_9 = 9;
    public const VERSION_10 = 10;

    /**
     * Get the list of all supported version.
     *
     * @return array<array-key, int>
     */
    public static function getAllVersions(): array
    {
        return [
            self::VERSION_8,
            self::VERSION_9,
            self::VERSION_10,
        ];
    }
}
