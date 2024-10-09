<?php

namespace Tests\Unit;

use Google\Ads\GoogleAds\V16\Services\Client\AccountLinkServiceClient as V16AccountLinkServiceClient;
use Google\Ads\GoogleAds\V16\Services\Client\AdGroupServiceClient as V16AdGroupServiceClient;
use Google\Ads\GoogleAds\V16\Services\Client\AdServiceClient as V16AdServiceClient;
use Google\Ads\GoogleAds\V16\Services\Client\CampaignServiceClient as V16CampaignServiceClient;
use Google\Ads\GoogleAds\V16\Services\Client\KeywordPlanAdGroupServiceClient as V16KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V16\Services\Client\KeywordPlanCampaignServiceClient as V16KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V17\Services\Client\AccountLinkServiceClient as V17AccountLinkServiceClient;
use Google\Ads\GoogleAds\V17\Services\Client\AdGroupServiceClient as V17AdGroupServiceClient;
use Google\Ads\GoogleAds\V17\Services\Client\AdServiceClient as V17AdServiceClient;
use Google\Ads\GoogleAds\V17\Services\Client\CampaignServiceClient as V17CampaignServiceClient;
use Google\Ads\GoogleAds\V17\Services\Client\KeywordPlanAdGroupServiceClient as V17KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V17\Services\Client\KeywordPlanCampaignServiceClient as V17KeywordPlanCampaignServiceClient;
use JoelButcher\GoogleAds\GoogleAds;
use JoelButcher\GoogleAds\GoogleAdsException;
use JoelButcher\GoogleAds\SupportedVersions;
use PHPUnit\Framework\TestCase;
use Tests\Fixtures\HasDefaultConfig;

class GoogleAdsTest extends TestCase
{
    use HasDefaultConfig;

    /**
     * @test
     */
    public function itThrowsIfNotAuthorized()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(),[SupportedVersions::VERSION_16]));

        $this->expectException(GoogleAdsException::class);
        $this->expectExceptionMessage('Google Ads Client has not been authorized, did you forget to call `authorize`?');

        $googleAds->getGoogleAdsClientOptions();
    }

    /**
     * @test
     */
    public function itCanGetClientOptions()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(),[SupportedVersions::VERSION_16]));
        $googleAds->authorize('token');

        $clientConfigOptions = $googleAds->getGoogleAdsClientOptions();

        $this->assertIsArray($clientConfigOptions);
        $this->assertArrayHasKey('credentials', $clientConfigOptions);
        $this->assertArrayHasKey('developer-token', $clientConfigOptions);
        $this->assertSame('dev-token', $clientConfigOptions['developer-token']);
        $this->assertArrayNotHasKey('login-customer-id', $clientConfigOptions);
        $this->assertArrayNotHasKey('linked-customer-id', $clientConfigOptions);
    }

    /**
     * @test
     */
    public function itCanGetClientOptionsWithLoginCustomerId()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(),[SupportedVersions::VERSION_16]));
        $googleAds->authorize('token', 12345678);

        $clientConfigOptions = $googleAds->getGoogleAdsClientOptions();

        $this->assertIsArray($clientConfigOptions);
        $this->assertArrayHasKey('credentials', $clientConfigOptions);
        $this->assertArrayHasKey('developer-token', $clientConfigOptions);
        $this->assertSame('dev-token', $clientConfigOptions['developer-token']);
        $this->assertArrayNotHasKey('linked-customer-id', $clientConfigOptions);
        $this->assertArrayHasKey('login-customer-id', $clientConfigOptions);
        $this->assertIsString($clientConfigOptions['login-customer-id']);
        $this->assertSame('12345678', $clientConfigOptions['login-customer-id']);
    }

        /**
     * @test
     */
    public function itCanRetrieveV16AccountLinkServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(),[SupportedVersions::VERSION_16]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16CampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(),[SupportedVersions::VERSION_16]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16AdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(),[SupportedVersions::VERSION_16]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16AdServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(),[SupportedVersions::VERSION_16]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16KeywordPlanCampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(),[SupportedVersions::VERSION_16]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16KeywordPlanAdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(),[SupportedVersions::VERSION_16]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV17AccountLinkServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_17]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V17AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV17CampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_17]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V17CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV17AdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_17]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V17AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV17AdServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_17]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V17AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV17KeywordPlanCampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_17]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V17KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV17KeywordPlanAdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_17]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V17KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }
}
