<?php

namespace JoelButcher\GoogleAds;

final class SupportedVersions
{
    public const VERSION_7 = 7;
    public const VERSION_8 = 8;
    public const VERSION_9 = 9;

    /**
     * Get the list of all supported version.
     *
     * @return array<array-key, int>
     */
    public static function getAllVersions(): array
    {
        return [
            self::VERSION_7,
            self::VERSION_8,
            self::VERSION_9,
        ];
    }
}
