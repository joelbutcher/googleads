<?php

namespace JoelButcher\GoogleAds\Adapters\V7;

use Google\Ads\GoogleAds\Lib\V7\GoogleAdsClient as V7Client;
use Google\Ads\GoogleAds\Lib\V7\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient as V8Client;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClient as V9Client;
use Google\Ads\GoogleAds\Lib\V7\GoogleAdsClientBuilder as V7ClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder as V8ClientBuilder;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClientBuilder as V9ClientBuilder;
use JoelButcher\GoogleAds\Adapters\AdapterAbstract;

class Adapter extends AdapterAbstract
{
    /**
     * Get the client builder used by the SDK adapter version.
     *
     * @return GoogleAdsClientBuilder
     */
    protected function getClientBuilder(): GoogleAdsClientBuilder
    {
        return (new GoogleAdsClientBuilder);
    }
}
