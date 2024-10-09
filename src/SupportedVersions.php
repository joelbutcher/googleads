<?php

namespace JoelButcher\GoogleAds;

final class SupportedVersions
{
    public const VERSION_16 = 16;
    public const VERSION_17 = 17;

    /**
     * Get the list of all supported version.
     *
     * @return array<array-key, int>
     */
    public static function getAllVersions(): array
    {
        return [
            self::VERSION_16,
            self::VERSION_17,
        ];
    }
}
