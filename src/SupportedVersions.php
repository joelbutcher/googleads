<?php

namespace JoelButcher\GoogleAds;

final class SupportedVersions
{
    public const VERSION_15 = 15;
    public const VERSION_16 = 16;

    /**
     * Get the list of all supported version.
     *
     * @return array<array-key, int>
     */
    public static function getAllVersions(): array
    {
        return [
            self::VERSION_15,
            self::VERSION_16,
        ];
    }
}
