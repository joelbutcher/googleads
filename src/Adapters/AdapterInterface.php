<?php

namespace JoelButcher\GoogleAds\Adapters;

use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient as V12Client;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClient as V13Client;

interface AdapterInterface
{
    /**
     * Build the Google Ads Client for the supported version.
     */
    public function getClient(string $refreshToken, ?int $loginCustomerId = null): V12Client|V13Client;
}
