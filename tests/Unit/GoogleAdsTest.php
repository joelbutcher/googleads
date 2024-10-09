<?php

namespace Tests\Unit;

use Google\Ads\GoogleAds\V15\Services\AccountLinkServiceClient as V15AccountLinkServiceClient;
use Google\Ads\GoogleAds\V15\Services\AdGroupServiceClient as V15AdGroupServiceClient;
use Google\Ads\GoogleAds\V15\Services\AdServiceClient as V15AdServiceClient;
use Google\Ads\GoogleAds\V15\Services\CampaignServiceClient as V15CampaignServiceClient;
use Google\Ads\GoogleAds\V15\Services\KeywordPlanAdGroupServiceClient as V15KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V15\Services\KeywordPlanCampaignServiceClient as V15KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V16\Services\AccountLinkServiceClient as V16AccountLinkServiceClient;
use Google\Ads\GoogleAds\V16\Services\AdGroupServiceClient as V16AdGroupServiceClient;
use Google\Ads\GoogleAds\V16\Services\AdServiceClient as V16AdServiceClient;
use Google\Ads\GoogleAds\V16\Services\CampaignServiceClient as V16CampaignServiceClient;
use Google\Ads\GoogleAds\V16\Services\KeywordPlanAdGroupServiceClient as V16KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V16\Services\KeywordPlanCampaignServiceClient as V16KeywordPlanCampaignServiceClient;
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
        $googleAds = new GoogleAds(...$this->getDefaultConfig());

        $this->expectException(GoogleAdsException::class);
        $this->expectExceptionMessage('Google Ads Client has not been authorized, did you forget to call `authorize`?');

        $googleAds->getGoogleAdsClientOptions();
    }

    /**
     * @test
     */
    public function itCanGetClientOptions()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
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
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
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
    public function itCanRetrieveV15AccountLinkServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_15]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V15AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV15CampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_15]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V15CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV15AdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_15]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V15AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV15AdServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_15]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V15AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV15KeywordPlanCampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_15]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V15KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV15KeywordPlanAdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_15]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V15KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16AccountLinkServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16CampaignServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16AdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16AdServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16KeywordPlanCampaignServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV16KeywordPlanAdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V16KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }
}
