<?php

namespace Tests\Unit;

use Google\Ads\GoogleAds\V7\Services\AccountLinkServiceClient as V7AccountLinkServiceClient;
use Google\Ads\GoogleAds\V7\Services\AdGroupServiceClient as V7AdGroupServiceClient;
use Google\Ads\GoogleAds\V7\Services\AdServiceClient as V7AdServiceClient;
use Google\Ads\GoogleAds\V7\Services\CampaignServiceClient as V7CampaignServiceClient;
use Google\Ads\GoogleAds\V7\Services\KeywordPlanAdGroupServiceClient as V7KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V7\Services\KeywordPlanCampaignServiceClient as V7KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V8\Services\AccountLinkServiceClient as V8AccountLinkServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupServiceClient as V8AdGroupServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdServiceClient as V8AdServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignServiceClient as V8CampaignServiceClient;
use Google\Ads\GoogleAds\V8\Services\KeywordPlanAdGroupServiceClient as V8KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V8\Services\KeywordPlanCampaignServiceClient as V8KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V9\Services\AccountLinkServiceClient as V9AccountLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupServiceClient as V9AdGroupServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdServiceClient as V9AdServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignServiceClient as V9CampaignServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanAdGroupServiceClient as V9KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanCampaignServiceClient as V9KeywordPlanCampaignServiceClient;
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
    public function itCanRetrieveV7AccountLinkServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_7]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V7AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV7CampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_7]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V7CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV7AdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_7]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V7AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV7AdServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_7]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V7AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV7KeywordPlanCampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_7]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V7KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV7KeywordPlanAdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_7]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V7KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV8AccountLinkServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_8]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V8AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV8CampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_8]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V8CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV8AdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_8]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V8AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV8AdServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_8]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V8AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV8KeywordPlanCampaignServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_8]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V8KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV8KeywordPlanAdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...array_merge($this->getDefaultConfig(), [SupportedVersions::VERSION_8]));
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V8KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV9AccountLinkServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V9AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV9CampaignServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V9CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV9AdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V9AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV9AdServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V9AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV9KeywordPlanCampaignServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V9KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @test
     */
    public function itCanRetrieveV9KeywordPlanAdGroupServiceClient()
    {
        $googleAds = new GoogleAds(...$this->getDefaultConfig());
        $googleAds->authorize('token', 12345678);
        $this->assertInstanceOf(V9KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }
}
