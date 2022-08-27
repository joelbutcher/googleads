<?php

namespace JoelButcher\GoogleAds\Adapters\V11;

use Google\Ads\GoogleAds\Lib\V11\GoogleAdsClientBuilder;
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
