<?php

namespace Tests;

use Google\Ads\GoogleAds\V6\Services\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V6\Services\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V6\Services\KeywordPlanCampaignServiceClient;
use JoelButcher\GoogleAds\GoogleAds;
use JoelButcher\GoogleAds\GoogleAdsException;
use PHPUnit\Framework\TestCase;

class GoogleAdsTest extends TestCase
{
    public function test_it_throws_google_ads_exception_if_not_authorized()
    {
        $googleAds = new GoogleAds([]);

        $this->expectException(GoogleAdsException::class);
        $this->expectExceptionMessage('Google Ads Client has not been authorized, did you forget to call `authorize`?');

        $googleAds->getGoogleAdsClientOptions();
    }

    /**
     * @dataProvider configProvider
     */
    public function test_it_can_retrieve_client_config_options_without_linked_customer_id($config)
    {
        $googleAds = new GoogleAds($config);

        $googleAds->authorize('token');

        $clientConfigOptions = $googleAds->getGoogleAdsClientOptions();

        $this->assertIsArray($clientConfigOptions);
        $this->assertArrayHasKey('credentials', $clientConfigOptions);
        $this->assertArrayHasKey('developer-token', $clientConfigOptions);
        $this->assertSame('some-dev-token', $clientConfigOptions['developer-token']);
        $this->assertArrayNotHasKey('linked-customer-id', $clientConfigOptions);
        $this->assertArrayHasKey('login-customer-id', $clientConfigOptions);
        $this->assertIsString($clientConfigOptions['login-customer-id']);
        $this->assertSame('12345678', $clientConfigOptions['login-customer-id']);
    }

    /**
     * @dataProvider configProvider
     */
    public function test_it_can_retrieve_client_config_options_with_linked_customer_id($config)
    {
        $googleAds = new GoogleAds($config);

        $googleAds->authorize('token', 12345678);

        $clientConfigOptions = $googleAds->getGoogleAdsClientOptions();

        $this->assertIsArray($clientConfigOptions);
        $this->assertArrayHasKey('credentials', $clientConfigOptions);
        $this->assertArrayHasKey('developer-token', $clientConfigOptions);
        $this->assertSame('some-dev-token', $clientConfigOptions['developer-token']);
        $this->assertArrayNotHasKey('login-customer-id', $clientConfigOptions);
        $this->assertArrayHasKey('linked-customer-id', $clientConfigOptions);
        $this->assertIsString($clientConfigOptions['linked-customer-id']);
        $this->assertSame('12345678', $clientConfigOptions['linked-customer-id']);
    }

    /**
     * @dataProvider configProvider
     */
    public function test_it_can_retrieve_account_link_service_client($config)
    {
        $googleAds = new GoogleAds($config);

        $googleAds->authorize('token', 12345678);

        $this->assertInstanceOf(AccountLinkServiceClient::class, $googleAds->getAccountLinkServiceClient());
    }

    /**
     * @dataProvider configProvider
     */
    public function test_it_can_retrieve_campaign_service_client($config)
    {
        $googleAds = new GoogleAds($config);

        $googleAds->authorize('token', 12345678);

        $this->assertInstanceOf(CampaignServiceClient::class, $googleAds->getCampaignServiceClient());
    }

    /**
     * @dataProvider configProvider
     */
    public function test_it_can_retrieve_ad_group_service_client($config)
    {
        $googleAds = new GoogleAds($config);

        $googleAds->authorize('token', 12345678);

        $this->assertInstanceOf(AdGroupServiceClient::class, $googleAds->getAdGroupServiceClient());
    }

    /**
     * @dataProvider configProvider
     */
    public function test_it_can_retrieve_ad_service_client($config)
    {
        $googleAds = new GoogleAds($config);

        $googleAds->authorize('token', 12345678);

        $this->assertInstanceOf(AdServiceClient::class, $googleAds->getAdServiceClient());
    }

    /**
     * @dataProvider configProvider
     */
    public function test_it_can_retrieve_keyword_plan_campaign_service_client($config)
    {
        $googleAds = new GoogleAds($config);

        $googleAds->authorize('token', 12345678);

        $this->assertInstanceOf(KeywordPlanCampaignServiceClient::class, $googleAds->getKeywordPlanCampaignServiceClient());
    }

    /**
     * @dataProvider configProvider
     */
    public function test_it_can_retrieve_keyword_plan_ad_group_service_client($config)
    {
        $googleAds = new GoogleAds($config);

        $googleAds->authorize('token', 12345678);

        $this->assertInstanceOf(KeywordPlanAdGroupServiceClient::class, $googleAds->getKeywordPlanAdGroupServiceClient());
    }

    public function configProvider()
    {
        $config = ['client_id' => 'some-id', 'client_secret' => 'some-secret', 'developer_token' => 'some-dev-token', 'login_customer_id' => 12345678];

        return [
            [$config],
        ];
    }
}
