<?php

namespace JoelButcher\GoogleAds;

use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V6\GoogleAdsClientBuilder as V6ClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder as V8ClientBuilder;
use Google\Auth\FetchAuthTokenInterface;

/**
 * @method array getGoogleAdsClientOptions()
 * @method \Google\Ads\GoogleAds\V6\Services\AccessibleBiddingStrategyServiceClient getAccessibleBiddingStrategyServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AccountBudgetProposalServiceClient getAccountBudgetProposalServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AccountBudgetServiceClient getAccountBudgetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AccountLinkServiceClient getAccountLinkServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupAdAssetViewServiceClient getAdGroupAdAssetViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupAdLabelServiceClient getAdGroupAdLabelServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupAdServiceClient getAdGroupAdServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupAssetServiceClient getAdGroupAssetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupAudienceViewServiceClient getAdGroupAudienceViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupBidModifierServiceClient getAdGroupBidModifierServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupCriterionCustomizerServiceClient getAdGroupCriterionCustomizerServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupCriterionLabelServiceClient getAdGroupCriterionLabelServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupCriterionServiceClient getAdGroupCriterionServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupCriterionSimulationServiceClient getAdGroupCriterionSimulationServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupCustomizerServiceClient getAdGroupCustomizerServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupExtensionSettingServiceClient getAdGroupExtensionSettingServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupFeedServiceClient getAdGroupFeedServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupLabelServiceClient getAdGroupLabelServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupServiceClient getAdGroupServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdGroupSimulationServiceClient getAdGroupSimulationServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdParameterServiceClient getAdParameterServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdScheduleViewServiceClient getAdScheduleViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AdServiceClient getAdServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AgeRangeViewServiceClient getAgeRangeViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AssetFieldTypeViewServiceClient getAssetFieldTypeViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AssetGroupAssetServiceClient getAssetGroupAssetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AssetGroupListingGroupFilterServiceClient getAssetGroupListingGroupFilterServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AssetGroupServiceClient getAssetGroupServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AssetServiceClient getAssetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AssetSetAssetServiceClient getAssetSetAssetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\AssetSetServiceClient getAssetSetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\BatchJobServiceClient getBatchJobServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\BiddingDataExclusionServiceClient getBiddingDataExclusionServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\BiddingSeasonalityAdjustmentServiceClient getBiddingSeasonalityAdjustmentServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\BiddingStrategyServiceClient getBiddingStrategyServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\BiddingStrategySimulationServiceClient getBiddingStrategySimulationServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\BillingSetupServiceClient getBillingSetupServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignAssetServiceClient getCampaignAssetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignAssetSetServiceClient getCampaignAssetSetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignAudienceViewServiceClient getCampaignAudienceViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignBidModifierServiceClient getCampaignBidModifierServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignBudgetServiceClient getCampaignBudgetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignConversionGoalServiceClient getCampaignConversionGoalServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignCriterionServiceClient getCampaignCriterionServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignCriterionSimulationServiceClient getCampaignCriterionSimulationServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignCustomizerServiceClient getCampaignCustomizerServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignDraftServiceClient getCampaignDraftServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignExperimentServiceClient getCampaignExperimentServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignExtensionSettingServiceClient getCampaignExtensionSettingServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignFeedServiceClient getCampaignFeedServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignLabelServiceClient getCampaignLabelServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignServiceClient getCampaignServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignSharedSetServiceClient getCampaignSharedSetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CampaignSimulationServiceClient getCampaignSimulationServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CarrierConstantServiceClient getCarrierConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ChangeStatusServiceClient getChangeStatusServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ClickViewServiceClient getClickViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CombinedAudienceServiceClient getCombinedAudienceServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ConversionActionServiceClient getConversionActionServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ConversionAdjustmentUploadServiceClient getConversionAdjustmentUploadServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ConversionCustomVariableServiceClient getConversionCustomVariableServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ConversionGoalCampaignConfigServiceClient getConversionGoalCampaignConfigServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ConversionUploadServiceClient getConversionUploadServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ConversionValueRuleServiceClient getConversionValueRuleServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ConversionValueRuleSetServiceClient getConversionValueRuleSetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CurrencyConstantServiceClient getCurrencyConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomAudienceServiceClient getCustomAudienceServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomConversionGoalServiceClient getCustomConversionGoalServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerAssetServiceClient getCustomerAssetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerClientLinkServiceClient getCustomerClientLinkServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerClientServiceClient getCustomerClientServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerConversionGoalServiceClient getCustomerConversionGoalServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ getCustomerCustomizerServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerExtensionSettingServiceClient getCustomerExtensionSettingServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerFeedServiceClient getCustomerFeedServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerLabelServiceClient getCustomerLabelServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerManagerLinkServiceClient getCustomerManagerLinkServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerNegativeCriterionServiceClient getCustomerNegativeCriterionServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerServiceClient getCustomerServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerUserAccessInvitationServiceClient getCustomerUserAccessInvitationServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomerUserAccessServiceClient getCustomerUserAccessServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomInterestServiceClient getCustomInterestServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\CustomizerAttributeServiceClient getCustomizerAttributeServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\DetailedDemographicServiceClient getDetailedDemographicServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\DetailPlacementViewServiceClient getDetailPlacementViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\DisplayKeywordViewServiceClient getDisplayKeywordViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\DistanceViewServiceClient getDistanceViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\DomainCategoryServiceClient getDomainCategoryServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\DynamicSearchAdsSearchTermViewServiceClient getDynamicSearchAdsSearchTermViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ExpandedLandingPageViewServiceClient getExpandedLandingPageViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ExtensionFeedItemServiceClient getExtensionFeedItemServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\FeedItemServiceClient getFeedItemServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\FeedItemSetLinkServiceClient getFeedItemSetLinkServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\FeedItemSetServiceClient getFeedItemSetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\FeedItemTargetServiceClient getFeedItemTargetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\FeedMappingServiceClient getFeedMappingServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\FeedPlaceholderViewServiceClient getFeedPlaceholderViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\FeedServiceClient getFeedServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\GenderViewServiceClient getGenderViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\GeographicViewServiceClient getGeographicViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\GeoTargetConstantServiceClient getGeoTargetConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\GoogleAdsFieldServiceClient getGoogleAdsFieldServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\GoogleAdsServiceClient getGoogleAdsServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\GroupPlacementViewServiceClient getGroupPlacementViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\HotelGroupViewServiceClient getHotelGroupViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\HotelPerformanceViewServiceClient getHotelPerformanceViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\IncomeRangeViewServiceClient getIncomeRangeViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\InvoiceServiceClient getInvoiceServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\KeywordPlanAdGroupKeywordServiceClient getKeywordPlanAdGroupKeywordServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\KeywordPlanAdGroupServiceClient getKeywordPlanAdGroupServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\KeywordPlanCampaignKeywordServiceClient getKeywordPlanCampaignKeywordServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\KeywordPlanCampaignServiceClient getKeywordPlanCampaignServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\KeywordPlanIdeaServiceClient getKeywordPlanIdeaServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\KeywordPlanServiceClient getKeywordPlanServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\KeywordThemeConstantServiceClient getKeywordThemeConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\KeywordViewServiceClient getKeywordViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\LabelServiceClient getLabelServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\LandingPageViewServiceClient getLandingPageViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\LanguageConstantServiceClient getLanguageConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\LifeEventServiceClient getLifeEventServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\LocationViewServiceClient getLocationViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ManagedPlacementViewServiceClient getManagedPlacementViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\MediaFileServiceClient getMediaFileServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\MerchantCenterLinkServiceClient getMerchantCenterLinkServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\MobileAppCategoryConstantServiceClient getMobileAppCategoryConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\MobileDeviceConstantServiceClient getMobileDeviceConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\OfflineUserDataJobServiceClient getOfflineUserDataJobServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\OperatingSystemVersionConstantServiceClient getOperatingSystemVersionConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\PaidOrganicSearchTermViewServiceClient getPaidOrganicSearchTermViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ParentalStatusViewServiceClient getParentalStatusViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\PaymentsAccountServiceClient getPaymentsAccountServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ProductBiddingCategoryConstantServiceClient getProductBiddingCategoryConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ProductGroupViewServiceClient getProductGroupViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ReachPlanServiceClient getReachPlanServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\RecommendationServiceClient getRecommendationServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\RemarketingActionServiceClient getRemarketingActionServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\SearchTermViewServiceClient getSearchTermViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\SharedCriterionServiceClient getSharedCriterionServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\SharedSetServiceClient getSharedSetServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ShoppingPerformanceViewServiceClient getShoppingPerformanceViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\SmartCampaignSearchTermViewServiceClient getSmartCampaignSearchTermViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\SmartCampaignSettingServiceClient getSmartCampaignSettingServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\SmartCampaignSuggestServiceClient getSmartCampaignSuggestServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\ThirdPartyAppAnalyticsLinkServiceClient getThirdPartyAppAnalyticsLinkServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\TopicConstantServiceClient getTopicConstantServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\TopicViewServiceClient getTopicViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\UserDataServiceClient getUserDataServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\UserInterestServiceClient getUserInterestServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\UserListServiceClient getUserListServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\UserLocationViewServiceClient getUserLocationViewServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\VideoServiceClient getVideoServiceClient()
 * @method \Google\Ads\GoogleAds\V6\Services\WebpageViewServiceClient getWebpageViewServiceClient()
 *
 * @see \Google\Ads\GoogleAds\Lib\V6\GoogleAdsClient
 */
class GoogleAds
{
    use ForwardsCalls;

    /**
     * The underlying GGoogle Ads client instance.
     *
     * @var \Google\Ads\GoogleAds\Lib\V6\GoogleAdsClient|\Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient|null
     */
    private $googleAdsClient = null;

    /**
     * The applications Client ID.
     *
     * @var string
     */
    private $clientId;

    /**
     * The applications Client Secret.
     *
     * @var string
     */
    private $clientSecret;

    /**
     * The applications Developer Token.
     *
     * @var string
     */
    private $developerToken;

    /**
     * The unique ID of the Google Ads manager account to act on behalf of.
     *
     * @var int|null
     */
    private $loginCustomerId;

    /**
     * Create a new Google Ads service instance.
     *
     * @param  array  $config
     * @return void
     */
    public function __construct(array $config)
    {
        $this->clientId = $config['client_id'] ?? null;
        $this->clientSecret = $config['client_secret'] ?? null;
        $this->developerToken = $config['developer_token'] ?? null;
        $this->loginCustomerId = $config['login_customer_id'] ?? null;
    }

    /**
     * Sets the linked customer ID for this client.
     *
     * This header is only required for methods that update the resources of an entity when
     * permissioned via Linked Accounts in the Google Ads UI (AccountLink resource in the Google Ads
     * API). Set this value to the customer ID of the data provider that updates the resources of
     * the specified customer ID. It should be set without dashes, for example: 1234567890 instead
     * of 123-456-7890. Read https://support.google.com/google-ads/answer/7365001 to learn more
     * about Linked Accounts.
     *
     * @param  int|null  $loginCustomerId
     * @return \JoelButcher\GoogleAds\GoogleAds
     */
    public function setLoginCustomerId(?int $loginCustomerId): GoogleAds
    {
        $this->loginCustomerId = $loginCustomerId;

        return $this;
    }

    /**
     * Get the OAuth2 Token builder for created a client builder.
     *
     * @param  string  $refreshToken
     * @return \Google\Auth\FetchAuthTokenInterface
     */
    protected function getTokenBuilder(string $refreshToken): FetchAuthTokenInterface
    {
        return (new OAuth2TokenBuilder())
            ->withClientId($this->clientId)
            ->withClientSecret($this->clientSecret)
            ->withRefreshToken($refreshToken)
            ->build();
    }

    /**
     * Get the Google Ads Client Builder for a given refresh token.
     *
     * @param  string  $refreshToken
     * @return \Google\Ads\GoogleAds\Lib\V6\GoogleAdsClientBuilder|\Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder
     */
    protected function getClientBuilder(string $refreshToken)
    {
        $class = PHP_VERSION > 7.2 && class_exists(V8ClientBuilder::class) ? V8ClientBuilder::class : V6ClientBuilder::class;

        return (new $class())
            ->withOAuth2Credential($this->getTokenBuilder($refreshToken))
            ->withDeveloperToken($this->developerToken);
    }

    /**
     * Build the Google Ads Client needed to make requests to the Google Ads API.
     *
     * @param  string  $refreshToken
     * @param  int|null  $linkedCustomerId
     * @return \Google\Ads\GoogleAds\Lib\V6\GoogleAdsClient|\Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient
     */
    protected function buildClient(string $refreshToken, ?int $linkedCustomerId = null)
    {
        $this->validateConfig();

        $clientBuilder = $this->getClientBuilder($refreshToken);

        if (is_null($linkedCustomerId)) {
            $clientBuilder->withLoginCustomerId($this->loginCustomerId);
        } else {
            $clientBuilder->withLinkedCustomerId($linkedCustomerId);
        }

        return $clientBuilder->build();
    }

    /**
     * Authorize the given access token and optional linked customer id with the Google Ads service.
     *
     * @param  string  $refreshToken
     * @param  int|null  $linkedCustomerId
     * @return \JoelButcher\GoogleAds\GoogleAds
     */
    public function authorize(string $refreshToken, ?int $linkedCustomerId = null): GoogleAds
    {
        $this->googleAdsClient = $this->buildClient($refreshToken, $linkedCustomerId);

        return $this;
    }

    /**
     * Determine if the services has been authorized.
     *
     * @return bool
     */
    public function isAuthorized(): bool
    {
        return ! is_null($this->googleAdsClient);
    }

    /**
     * Validate that the services has been propertly configured.
     *
     * @return void
     *
     * @throws \JoelButcher\GoogleAds\ConfigException
     */
    private function validateConfig(): void
    {
        if (! $this->clientId) {
            static::throwNewConfigException('The Client ID has not been configured.');
        }

        if (! $this->clientSecret) {
            static::throwNewConfigException('The Client Secret has not been configured.');
        }

        if (! $this->developerToken) {
            static::throwNewConfigException('A Developer Token has not been specified.');
        }

        if (! $this->loginCustomerId) {
            static::throwNewConfigException('A Login Customer ID has not been specified.');
        }

        if (! is_int($this->loginCustomerId)) {
            static::throwNewConfigException('The provided Login Customer ID is not an integer.');
        }
    }

    /**
     * Throws a config exception for the given message.
     *
     * @param  string  $message
     * @return void
     *
     * @throws \JoelButcher\GoogleAds\ConfigException
     */
    protected static function throwNewConfigException(string $message): void
    {
        throw new ConfigException($message);
    }

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (in_array($method, ['authorize'])) {
            return $this->{$method}(...$parameters);
        }

        if (! $this->isAuthorized()) {
            throw new GoogleAdsException('Google Ads Client has not been authorized, did you forget to call `authorize`?');
        }

        return $this->forwardCallTo($this->googleAdsClient, $method, $parameters);
    }
}
