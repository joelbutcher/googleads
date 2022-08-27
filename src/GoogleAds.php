<?php

namespace JoelButcher\GoogleAds;

use Google\Ads\GoogleAds\Lib\V7\GoogleAdsClient as V7GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient as V8GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClient as V9GoogleAdsClient;
use Google\Ads\GoogleAds\V9\Services\AccessibleBiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V9\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V9\Services\AccountBudgetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAdAssetViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAudienceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCriterionCustomizerServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCustomizerServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupSimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdParameterServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdScheduleViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdServiceClient;
use Google\Ads\GoogleAds\V9\Services\AgeRangeViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetFieldTypeViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetGroupAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetGroupListingGroupFilterServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetGroupServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetSetAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\BatchJobServiceClient;
use Google\Ads\GoogleAds\V9\Services\BiddingDataExclusionServiceClient;
use Google\Ads\GoogleAds\V9\Services\BiddingSeasonalityAdjustmentServiceClient;
use Google\Ads\GoogleAds\V9\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V9\Services\BiddingStrategySimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignAssetSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignAudienceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignConversionGoalServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignCustomizerServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignExperimentServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignSimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\CarrierConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\ChangeStatusServiceClient;
use Google\Ads\GoogleAds\V9\Services\ClickViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\CombinedAudienceServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionAdjustmentUploadServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionCustomVariableServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionGoalCampaignConfigServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionUploadServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionValueRuleServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionValueRuleSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CurrencyConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomConversionGoalServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerClientServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerConversionGoalServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomizerAttributeServiceClient;
use Google\Ads\GoogleAds\V9\Services\DetailedDemographicServiceClient;
use Google\Ads\GoogleAds\V9\Services\DetailPlacementViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\DisplayKeywordViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\DistanceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\DomainCategoryServiceClient;
use Google\Ads\GoogleAds\V9\Services\DynamicSearchAdsSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ExpandedLandingPageViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedItemServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedItemSetLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedItemSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedPlaceholderViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V9\Services\GenderViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\GeographicViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V9\Services\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V9\Services\GroupPlacementViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\HotelGroupViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\HotelPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\IncomeRangeViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\InvoiceServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanIdeaServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordThemeConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\LandingPageViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\LanguageConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\LifeEventServiceClient;
use Google\Ads\GoogleAds\V9\Services\LocationViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ManagedPlacementViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\MediaFileServiceClient;
use Google\Ads\GoogleAds\V9\Services\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\MobileAppCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\MobileDeviceConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V9\Services\OperatingSystemVersionConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\PaidOrganicSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ParentalStatusViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\PaymentsAccountServiceClient;
use Google\Ads\GoogleAds\V9\Services\ProductBiddingCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\ProductGroupViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ReachPlanServiceClient;
use Google\Ads\GoogleAds\V9\Services\RecommendationServiceClient;
use Google\Ads\GoogleAds\V9\Services\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V9\Services\SearchTermViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V9\Services\SharedSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\ShoppingPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\SmartCampaignSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\SmartCampaignSettingServiceClient;
use Google\Ads\GoogleAds\V9\Services\SmartCampaignSuggestServiceClient;
use Google\Ads\GoogleAds\V9\Services\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\TopicConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\TopicViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\UserDataServiceClient;
use Google\Ads\GoogleAds\V9\Services\UserInterestServiceClient;
use Google\Ads\GoogleAds\V9\Services\UserListServiceClient;
use Google\Ads\GoogleAds\V9\Services\UserLocationViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\VideoServiceClient;
use Google\Ads\GoogleAds\V9\Services\WebpageViewServiceClient;
use JoelButcher\GoogleAds\Adapters\AdapterFactory;
use JoelButcher\GoogleAds\Adapters\AdapterInterface;
use JoelButcher\GoogleAds\Adapters\V9\Adapter;
use JoelButcher\GoogleAds\Concerns\ValidatesConfig;
use Psr\Log\LoggerInterface;

/**
 * @method array getGoogleAdsClientOptions()
 * @method AccessibleBiddingStrategyServiceClient getAccessibleBiddingStrategyServiceClient()
 * @method AccountBudgetProposalServiceClient getAccountBudgetProposalServiceClient()
 * @method AccountBudgetServiceClient getAccountBudgetServiceClient()
 * @method AccountLinkServiceClient getAccountLinkServiceClient()
 * @method AdGroupAdAssetViewServiceClient getAdGroupAdAssetViewServiceClient()
 * @method AdGroupAdLabelServiceClient getAdGroupAdLabelServiceClient()
 * @method AdGroupAdServiceClient getAdGroupAdServiceClient()
 * @method AdGroupAssetServiceClient getAdGroupAssetServiceClient()
 * @method AdGroupAudienceViewServiceClient getAdGroupAudienceViewServiceClient()
 * @method AdGroupBidModifierServiceClient getAdGroupBidModifierServiceClient()
 * @method AdGroupCriterionCustomizerServiceClient getAdGroupCriterionCustomizerServiceClient()
 * @method AdGroupCriterionLabelServiceClient getAdGroupCriterionLabelServiceClient()
 * @method AdGroupCriterionServiceClient getAdGroupCriterionServiceClient()
 * @method AdGroupCriterionSimulationServiceClient getAdGroupCriterionSimulationServiceClient()
 * @method AdGroupCustomizerServiceClient getAdGroupCustomizerServiceClient()
 * @method AdGroupExtensionSettingServiceClient getAdGroupExtensionSettingServiceClient()
 * @method AdGroupFeedServiceClient getAdGroupFeedServiceClient()
 * @method AdGroupLabelServiceClient getAdGroupLabelServiceClient()
 * @method AdGroupServiceClient getAdGroupServiceClient()
 * @method AdGroupSimulationServiceClient getAdGroupSimulationServiceClient()
 * @method AdParameterServiceClient getAdParameterServiceClient()
 * @method AdScheduleViewServiceClient getAdScheduleViewServiceClient()
 * @method AdServiceClient getAdServiceClient()
 * @method AgeRangeViewServiceClient getAgeRangeViewServiceClient()
 * @method AssetFieldTypeViewServiceClient getAssetFieldTypeViewServiceClient()
 * @method AssetGroupAssetServiceClient getAssetGroupAssetServiceClient()
 * @method AssetGroupListingGroupFilterServiceClient getAssetGroupListingGroupFilterServiceClient()
 * @method AssetGroupServiceClient getAssetGroupServiceClient()
 * @method AssetServiceClient getAssetServiceClient()
 * @method AssetSetAssetServiceClient getAssetSetAssetServiceClient()
 * @method AssetSetServiceClient getAssetSetServiceClient()
 * @method BatchJobServiceClient getBatchJobServiceClient()
 * @method BiddingDataExclusionServiceClient getBiddingDataExclusionServiceClient()
 * @method BiddingSeasonalityAdjustmentServiceClient getBiddingSeasonalityAdjustmentServiceClient()
 * @method BiddingStrategyServiceClient getBiddingStrategyServiceClient()
 * @method BiddingStrategySimulationServiceClient getBiddingStrategySimulationServiceClient()
 * @method BillingSetupServiceClient getBillingSetupServiceClient()
 * @method CampaignAssetServiceClient getCampaignAssetServiceClient()
 * @method CampaignAssetSetServiceClient getCampaignAssetSetServiceClient()
 * @method CampaignAudienceViewServiceClient getCampaignAudienceViewServiceClient()
 * @method CampaignBidModifierServiceClient getCampaignBidModifierServiceClient()
 * @method CampaignBudgetServiceClient getCampaignBudgetServiceClient()
 * @method CampaignConversionGoalServiceClient getCampaignConversionGoalServiceClient()
 * @method CampaignCriterionServiceClient getCampaignCriterionServiceClient()
 * @method CampaignCriterionSimulationServiceClient getCampaignCriterionSimulationServiceClient()
 * @method CampaignCustomizerServiceClient getCampaignCustomizerServiceClient()
 * @method CampaignDraftServiceClient getCampaignDraftServiceClient()
 * @method CampaignExperimentServiceClient getCampaignExperimentServiceClient()
 * @method CampaignExtensionSettingServiceClient getCampaignExtensionSettingServiceClient()
 * @method CampaignFeedServiceClient getCampaignFeedServiceClient()
 * @method CampaignLabelServiceClient getCampaignLabelServiceClient()
 * @method CampaignServiceClient getCampaignServiceClient()
 * @method CampaignSharedSetServiceClient getCampaignSharedSetServiceClient()
 * @method CampaignSimulationServiceClient getCampaignSimulationServiceClient()
 * @method CarrierConstantServiceClient getCarrierConstantServiceClient()
 * @method ChangeStatusServiceClient getChangeStatusServiceClient()
 * @method ClickViewServiceClient getClickViewServiceClient()
 * @method CombinedAudienceServiceClient getCombinedAudienceServiceClient()
 * @method ConversionActionServiceClient getConversionActionServiceClient()
 * @method ConversionAdjustmentUploadServiceClient getConversionAdjustmentUploadServiceClient()
 * @method ConversionCustomVariableServiceClient getConversionCustomVariableServiceClient()
 * @method ConversionGoalCampaignConfigServiceClient getConversionGoalCampaignConfigServiceClient()
 * @method ConversionUploadServiceClient getConversionUploadServiceClient()
 * @method ConversionValueRuleServiceClient getConversionValueRuleServiceClient()
 * @method ConversionValueRuleSetServiceClient getConversionValueRuleSetServiceClient()
 * @method CurrencyConstantServiceClient getCurrencyConstantServiceClient()
 * @method CustomAudienceServiceClient getCustomAudienceServiceClient()
 * @method CustomConversionGoalServiceClient getCustomConversionGoalServiceClient()
 * @method CustomerAssetServiceClient getCustomerAssetServiceClient()
 * @method CustomerClientLinkServiceClient getCustomerClientLinkServiceClient()
 * @method CustomerClientServiceClient getCustomerClientServiceClient()
 * @method CustomerConversionGoalServiceClient getCustomerConversionGoalServiceClient()
 * @method \Google\Ads\GoogleAds\V9\Services\ getCustomerCustomizerServiceClient()
 * @method CustomerExtensionSettingServiceClient getCustomerExtensionSettingServiceClient()
 * @method CustomerFeedServiceClient getCustomerFeedServiceClient()
 * @method CustomerLabelServiceClient getCustomerLabelServiceClient()
 * @method CustomerManagerLinkServiceClient getCustomerManagerLinkServiceClient()
 * @method CustomerNegativeCriterionServiceClient getCustomerNegativeCriterionServiceClient()
 * @method CustomerServiceClient getCustomerServiceClient()
 * @method CustomerUserAccessInvitationServiceClient getCustomerUserAccessInvitationServiceClient()
 * @method CustomerUserAccessServiceClient getCustomerUserAccessServiceClient()
 * @method CustomInterestServiceClient getCustomInterestServiceClient()
 * @method CustomizerAttributeServiceClient getCustomizerAttributeServiceClient()
 * @method DetailedDemographicServiceClient getDetailedDemographicServiceClient()
 * @method DetailPlacementViewServiceClient getDetailPlacementViewServiceClient()
 * @method DisplayKeywordViewServiceClient getDisplayKeywordViewServiceClient()
 * @method DistanceViewServiceClient getDistanceViewServiceClient()
 * @method DomainCategoryServiceClient getDomainCategoryServiceClient()
 * @method DynamicSearchAdsSearchTermViewServiceClient getDynamicSearchAdsSearchTermViewServiceClient()
 * @method ExpandedLandingPageViewServiceClient getExpandedLandingPageViewServiceClient()
 * @method ExtensionFeedItemServiceClient getExtensionFeedItemServiceClient()
 * @method FeedItemServiceClient getFeedItemServiceClient()
 * @method FeedItemSetLinkServiceClient getFeedItemSetLinkServiceClient()
 * @method FeedItemSetServiceClient getFeedItemSetServiceClient()
 * @method FeedItemTargetServiceClient getFeedItemTargetServiceClient()
 * @method FeedMappingServiceClient getFeedMappingServiceClient()
 * @method FeedPlaceholderViewServiceClient getFeedPlaceholderViewServiceClient()
 * @method FeedServiceClient getFeedServiceClient()
 * @method GenderViewServiceClient getGenderViewServiceClient()
 * @method GeographicViewServiceClient getGeographicViewServiceClient()
 * @method GeoTargetConstantServiceClient getGeoTargetConstantServiceClient()
 * @method GoogleAdsFieldServiceClient getGoogleAdsFieldServiceClient()
 * @method GoogleAdsServiceClient getGoogleAdsServiceClient()
 * @method GroupPlacementViewServiceClient getGroupPlacementViewServiceClient()
 * @method HotelGroupViewServiceClient getHotelGroupViewServiceClient()
 * @method HotelPerformanceViewServiceClient getHotelPerformanceViewServiceClient()
 * @method IncomeRangeViewServiceClient getIncomeRangeViewServiceClient()
 * @method InvoiceServiceClient getInvoiceServiceClient()
 * @method KeywordPlanAdGroupKeywordServiceClient getKeywordPlanAdGroupKeywordServiceClient()
 * @method KeywordPlanAdGroupServiceClient getKeywordPlanAdGroupServiceClient()
 * @method KeywordPlanCampaignKeywordServiceClient getKeywordPlanCampaignKeywordServiceClient()
 * @method KeywordPlanCampaignServiceClient getKeywordPlanCampaignServiceClient()
 * @method KeywordPlanIdeaServiceClient getKeywordPlanIdeaServiceClient()
 * @method KeywordPlanServiceClient getKeywordPlanServiceClient()
 * @method KeywordThemeConstantServiceClient getKeywordThemeConstantServiceClient()
 * @method KeywordViewServiceClient getKeywordViewServiceClient()
 * @method LabelServiceClient getLabelServiceClient()
 * @method LandingPageViewServiceClient getLandingPageViewServiceClient()
 * @method LanguageConstantServiceClient getLanguageConstantServiceClient()
 * @method LifeEventServiceClient getLifeEventServiceClient()
 * @method LocationViewServiceClient getLocationViewServiceClient()
 * @method ManagedPlacementViewServiceClient getManagedPlacementViewServiceClient()
 * @method MediaFileServiceClient getMediaFileServiceClient()
 * @method MerchantCenterLinkServiceClient getMerchantCenterLinkServiceClient()
 * @method MobileAppCategoryConstantServiceClient getMobileAppCategoryConstantServiceClient()
 * @method MobileDeviceConstantServiceClient getMobileDeviceConstantServiceClient()
 * @method OfflineUserDataJobServiceClient getOfflineUserDataJobServiceClient()
 * @method OperatingSystemVersionConstantServiceClient getOperatingSystemVersionConstantServiceClient()
 * @method PaidOrganicSearchTermViewServiceClient getPaidOrganicSearchTermViewServiceClient()
 * @method ParentalStatusViewServiceClient getParentalStatusViewServiceClient()
 * @method PaymentsAccountServiceClient getPaymentsAccountServiceClient()
 * @method ProductBiddingCategoryConstantServiceClient getProductBiddingCategoryConstantServiceClient()
 * @method ProductGroupViewServiceClient getProductGroupViewServiceClient()
 * @method ReachPlanServiceClient getReachPlanServiceClient()
 * @method RecommendationServiceClient getRecommendationServiceClient()
 * @method RemarketingActionServiceClient getRemarketingActionServiceClient()
 * @method SearchTermViewServiceClient getSearchTermViewServiceClient()
 * @method SharedCriterionServiceClient getSharedCriterionServiceClient()
 * @method SharedSetServiceClient getSharedSetServiceClient()
 * @method ShoppingPerformanceViewServiceClient getShoppingPerformanceViewServiceClient()
 * @method SmartCampaignSearchTermViewServiceClient getSmartCampaignSearchTermViewServiceClient()
 * @method SmartCampaignSettingServiceClient getSmartCampaignSettingServiceClient()
 * @method SmartCampaignSuggestServiceClient getSmartCampaignSuggestServiceClient()
 * @method ThirdPartyAppAnalyticsLinkServiceClient getThirdPartyAppAnalyticsLinkServiceClient()
 * @method TopicConstantServiceClient getTopicConstantServiceClient()
 * @method TopicViewServiceClient getTopicViewServiceClient()
 * @method UserDataServiceClient getUserDataServiceClient()
 * @method UserInterestServiceClient getUserInterestServiceClient()
 * @method UserListServiceClient getUserListServiceClient()
 * @method UserLocationViewServiceClient getUserLocationViewServiceClient()
 * @method VideoServiceClient getVideoServiceClient()
 * @method WebpageViewServiceClient getWebpageViewServiceClient()
 *
 * @see \Google\Ads\GoogleAds\Lib\V9\GoogleAdsClient
 */
final class GoogleAds
{
    use ForwardsCalls;
    use ValidatesConfig;

    /**
     * The underlying Google Ads client instance.
     *
     * @var V7GoogleAdsClient|V8GoogleAdsClient|V9GoogleAdsClient|null
     */
    private $googleAdsClient = null;

    /**
     * The adapter used to interact with a given SDK version.
     *
     * @var AdapterInterface|null
     */
    private $adapter = null;

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
     * The transport protocol used by the client.
     *
     * @var string
     */
    protected $transportProtocol = 'rest';

    /**
     * The minimum log level we should be logging.
     *
     * @var string
     */
    protected $logLevel = 'info';

    /**
     * The underlying logger implementation.
     *
     * @var LoggerInterface|null
     */
    protected $logger = null;

    /**
     * Create a new Google Ads service instance.
     *
     * @param  string  $clientId
     * @param  string  $clientSecret
     * @param  string  $developerToken
     * @param  int  $sdkVersion
     * @param  string  $transportProtocol
     * @param  string  $logLevel
     * @param  LoggerInterface|null  $logger
     * @return void
     *
     * @throws ConfigException
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        string $developerToken,
        int $sdkVersion = SupportedVersions::VERSION_11,
        string $transportProtocol = 'rest',
        ?LoggerInterface $logger = null,
        string $logLevel = 'info'
    ) {
        $this->validateConfig($clientId, $clientSecret, $developerToken, $transportProtocol, $logLevel);
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->developerToken = $developerToken;
        $this->transportProtocol = $transportProtocol;
        $this->logger = $logger;
        $this->logLevel = strtoupper($logLevel);

        if (! in_array($sdkVersion, SupportedVersions::getAllVersions())) {
            $this->throwNewConfigException(sprintf(
                'Unsupported version "%s". Exepected one of: "%s".',
                $sdkVersion,
                implode(', ', SupportedVersions::getAllVersions())
            ));
        }

        $this->sdkVersion = $sdkVersion;
    }

    /**
     * Get the adapter for the given SDK Version.
     *
     * @return AdapterInterface
     *
     * @throws ConfigException
     */
    protected function getAdapter(): AdapterInterface
    {
        if (is_null($this->adapter)) {
            $this->adapter = AdapterFactory::build($this->sdkVersion, [
                $this->clientId,
                $this->clientSecret,
                $this->developerToken,
                $this->transportProtocol,
                $this->logger,
                $this->logLevel,
            ]);
        }

        return $this->adapter;
    }

    /**
     * Authorize the given access token and optional linked customer id with the Google Ads service.
     *
     * @param  string  $refreshToken
     * @param  int|null  $loginCustomerId
     * @return GoogleAds
     *
     * @throws ConfigException
     */
    public function authorize(string $refreshToken, ?int $loginCustomerId = null): GoogleAds
    {
        $this->googleAdsClient = $this->getAdapter()->getClient($refreshToken, $loginCustomerId);

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
