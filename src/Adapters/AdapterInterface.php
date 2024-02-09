<?php

namespace JoelButcher\GoogleAds\Adapters;

use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient as V14Client;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient as V15Client;

interface AdapterInterface
{
    /**
     * Build the Google Ads Client for the supported version.
     */
    public function getClient(string $refreshToken, ?int $loginCustomerId = null): V14Client|V15Client;
}
