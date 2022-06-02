<?php

namespace JoelButcher\GoogleAds\Adapters;

use Google\Ads\GoogleAds\Lib\V10\GoogleAdsClient as V10Client;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient as V8Client;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClient as V9Client;

interface AdapterInterface
{
    /**
     * Build the Google Ads Client for the supported version.
     *
     * @param  string  $refreshToken
     * @param  int|null  $loginCustomerId
     * @return V8Client|V9Client|V10Client
     */
    public function getClient(string $refreshToken, ?int $loginCustomerId = null);
}
