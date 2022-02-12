<?php

namespace JoelButcher\GoogleAds\Adapters;

use Google\Ads\GoogleAds\Lib\V7\GoogleAdsClient as V7Client;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient as V8Client;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClient as V9Client;

interface AdapterInterface
{
    /**
     * Build the Google Ads Client for the supported version.
     *
     * @param  string  $refreshToken
     * @param  int|null  $loginCustomerId
     * @return V7Client|V8Client|V9Client
     */
    public function getClient(string $refreshToken, ?int $loginCustomerId = null);
}
