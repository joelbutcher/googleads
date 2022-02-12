<?php

namespace JoelButcher\GoogleAds\Adapters\V9;

use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClientBuilder;
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
        return new GoogleAdsClientBuilder;
    }
}
