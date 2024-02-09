<?php

namespace JoelButcher\GoogleAds;

final class SupportedVersions
{
    public const VERSION_14 = 14;
    public const VERSION_15 = 15;

    /**
     * Get the list of all supported version.
     *
     * @return array<array-key, int>
     */
    public static function getAllVersions(): array
    {
        return [
            self::VERSION_14,
            self::VERSION_15,
        ];
    }
}
