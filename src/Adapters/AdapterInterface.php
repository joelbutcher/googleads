<?php

namespace JoelButcher\GoogleAds\Adapters;

use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient as V15Client;
use Google\Ads\GoogleAds\Lib\V16\GoogleAdsClient as V16Client;

interface AdapterInterface
{
    /**
     * Build the Google Ads Client for the supported version.
     */
    public function getClient(string $refreshToken, ?int $loginCustomerId = null): V15Client|V16Client;
}
