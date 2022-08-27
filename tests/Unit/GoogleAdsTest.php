<?php

namespace Tests\Unit;

use Google\Ads\GoogleAds\V10\Services\AccountLinkServiceClient as V10AccountLinkServiceClient;
use Google\Ads\GoogleAds\V10\Services\AdGroupServiceClient as V10AdGroupServiceClient;
use Google\Ads\GoogleAds\V10\Services\AdServiceClient as V10AdServiceClient;
use Google\Ads\GoogleAds\V10\Services\CampaignServiceClient as V10CampaignServiceClient;
use Google\Ads\GoogleAds\V10\Services\KeywordPlanAdGroupServiceClient as V10KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V10\Services\KeywordPlanCampaignServiceClient as V10KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V11\Services\AccountLinkServiceClient as V11AccountLinkServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupServiceClient as V11AdGroupServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdServiceClient as V11AdServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignServiceClient as V11CampaignServiceClient;
use Google\Ads\GoogleAds\V11\Services\KeywordPlanAdGroupServiceClient as V11KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V11\Services\KeywordPlanCampaignServiceClient as V11KeywordPlanCampaignServiceClient;
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
    public function itCanRetrieveV10AccountLinkServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_10]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V10AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV10CampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_10]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V10CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV10AdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_10]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V10AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV10AdServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_10]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V10AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV10KeywordPlanCampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_10]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V10KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV10KeywordPlanAdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_10]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V10KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV11AccountLinkServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V11AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV11CampaignServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V11CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV11AdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V11AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV11AdServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V11AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV11KeywordPlanCampaignServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V11KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV11KeywordPlanAdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V11KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }
}
