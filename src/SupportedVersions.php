<?php

namespace JoelButcher\GoogleAds;

final class SupportedVersions
{
    public const VERSION_12 = 12;
    public const VERSION_13 = 13;

    /**
     * Get the list of all supported version.
     *
     * @return array<array-key, int>
     */
    public static function getAllVersions(): array
    {
        return [
            self::VERSION_12,
            self::VERSION_13,
        ];
    }
}
