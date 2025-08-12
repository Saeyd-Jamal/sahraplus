<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {return view('welcome');})->name('home');

Route::apiResource('/activity_logs', App\Http\Controllers\ActivityLogController::class);

Route::apiResource('/addresses', App\Http\Controllers\AddressController::class);

Route::apiResource('/avatars', App\Http\Controllers\AvatarController::class);

Route::apiResource('/banners', App\Http\Controllers\BannerController::class);

Route::apiResource('/cast_crews', App\Http\Controllers\CastCrewController::class);

Route::apiResource('/cities', App\Http\Controllers\CityController::class);

Route::apiResource('/comments', App\Http\Controllers\CommentController::class);

Route::apiResource('/comment_likes', App\Http\Controllers\CommentLikeController::class);

Route::apiResource('/constants', App\Http\Controllers\ConstantController::class);

Route::apiResource('/continue_watches', App\Http\Controllers\ContinueWatchController::class);

Route::apiResource('/countries', App\Http\Controllers\CountryController::class);

Route::apiResource('/coupons', App\Http\Controllers\CouponController::class);

Route::apiResource('/coupon_subscription_plans', App\Http\Controllers\CouponSubscriptionPlanController::class);

Route::apiResource('/currencies', App\Http\Controllers\CurrencyController::class);

Route::apiResource('/devices', App\Http\Controllers\DeviceController::class);

Route::apiResource('/entertainments', App\Http\Controllers\EntertainmentController::class);

Route::apiResource('/entertainment_country_mappings', App\Http\Controllers\EntertainmentCountryMappingController::class);

Route::apiResource('/entertainment_downloads', App\Http\Controllers\EntertainmentDownloadController::class);

Route::apiResource('/entertainment_download_mappings', App\Http\Controllers\EntertainmentDownloadMappingController::class);

Route::apiResource('/entertainment_gener_mappings', App\Http\Controllers\EntertainmentGenerMappingController::class);

Route::apiResource('/entertainment_stream_content_mappings', App\Http\Controllers\EntertainmentStreamContentMappingController::class);

Route::apiResource('/entertainment_talent_mappings', App\Http\Controllers\EntertainmentTalentMappingController::class);

Route::apiResource('/entertainment_views', App\Http\Controllers\EntertainmentViewController::class);

Route::apiResource('/episodes', App\Http\Controllers\EpisodeController::class);

Route::apiResource('/episode_download_mappings', App\Http\Controllers\EpisodeDownloadMappingController::class);

Route::apiResource('/episode_stream_content_mappings', App\Http\Controllers\EpisodeStreamContentMappingController::class);

Route::apiResource('/failed_jobs', App\Http\Controllers\FailedJobController::class);

Route::apiResource('/faqs', App\Http\Controllers\FaqController::class);

Route::apiResource('/filemanagers', App\Http\Controllers\FilemanagerController::class);

Route::apiResource('/genres', App\Http\Controllers\GenreController::class);

Route::apiResource('/home_sliders', App\Http\Controllers\HomeSliderController::class);

Route::apiResource('/installers', App\Http\Controllers\InstallerController::class);

Route::apiResource('/jobs', App\Http\Controllers\JobController::class);

Route::apiResource('/job_batches', App\Http\Controllers\JobBatchController::class);

Route::apiResource('/languages', App\Http\Controllers\LanguageController::class);

Route::apiResource('/likes', App\Http\Controllers\LikeController::class);

Route::apiResource('/livetvs', App\Http\Controllers\LivetvController::class);

Route::apiResource('/live_tv_categories', App\Http\Controllers\LiveTvCategoryController::class);

Route::apiResource('/live_tv_channels', App\Http\Controllers\LiveTvChannelController::class);

Route::apiResource('/live_tv_stream_content_mappings', App\Http\Controllers\LiveTvStreamContentMappingController::class);

Route::apiResource('/media', App\Http\Controllers\MediaController::class);

Route::apiResource('/mobile_settings', App\Http\Controllers\MobileSettingController::class);

Route::apiResource('/model_has_permissions', App\Http\Controllers\ModelHasPermissionController::class);

Route::apiResource('/model_has_roles', App\Http\Controllers\ModelHasRoleController::class);

Route::apiResource('/notifications', App\Http\Controllers\NotificationController::class);

Route::apiResource('/notification_templates', App\Http\Controllers\NotificationTemplateController::class);

Route::apiResource('/notification_template_content_mappings', App\Http\Controllers\NotificationTemplateContentMappingController::class);

Route::apiResource('/pages', App\Http\Controllers\PageController::class);

Route::apiResource('/password_resets', App\Http\Controllers\PasswordResetController::class);

Route::apiResource('/permissions', App\Http\Controllers\PermissionController::class);

Route::apiResource('/personal_access_tokens', App\Http\Controllers\PersonalAccessTokenController::class);

Route::apiResource('/plans', App\Http\Controllers\PlanController::class);

Route::apiResource('/planlimitations', App\Http\Controllers\PlanlimitationController::class);

Route::apiResource('/planlimitation_mappings', App\Http\Controllers\PlanlimitationMappingController::class);

Route::apiResource('/reviews', App\Http\Controllers\ReviewController::class);

Route::apiResource('/roles', App\Http\Controllers\RoleController::class);

Route::apiResource('/role_has_permissions', App\Http\Controllers\RoleHasPermissionController::class);

Route::apiResource('/seasons', App\Http\Controllers\SeasonController::class);

Route::apiResource('/service_providers', App\Http\Controllers\ServiceProviderController::class);

Route::apiResource('/sessions', App\Http\Controllers\SessionController::class);

Route::apiResource('/settings', App\Http\Controllers\SettingController::class);

Route::apiResource('/settings', App\Http\Controllers\SettingsController::class);

Route::apiResource('/shorts', App\Http\Controllers\ShortController::class);

Route::apiResource('/slider_items', App\Http\Controllers\SliderItemController::class);

Route::apiResource('/states', App\Http\Controllers\StateController::class);

Route::apiResource('/subscriptions', App\Http\Controllers\SubscriptionController::class);

Route::apiResource('/subscriptions_transactions', App\Http\Controllers\SubscriptionsTransactionController::class);

Route::apiResource('/subtitles', App\Http\Controllers\SubtitleController::class);

Route::apiResource('/taxes', App\Http\Controllers\TaxeController::class);

Route::apiResource('/tv_login_sessions', App\Http\Controllers\TvLoginSessionController::class);

Route::apiResource('/users', App\Http\Controllers\UserController::class);

Route::apiResource('/user_coupon_redeems', App\Http\Controllers\UserCouponRedeemController::class);

Route::apiResource('/user_multi_profiles', App\Http\Controllers\UserMultiProfileController::class);

Route::apiResource('/user_profiles', App\Http\Controllers\UserProfileController::class);

Route::apiResource('/user_providers', App\Http\Controllers\UserProviderController::class);

Route::apiResource('/user_reminders', App\Http\Controllers\UserReminderController::class);

Route::apiResource('/user_search_histories', App\Http\Controllers\UserSearchHistoryController::class);

Route::apiResource('/user_watch_histories', App\Http\Controllers\UserWatchHistoryController::class);

Route::apiResource('/videos', App\Http\Controllers\VideoController::class);

Route::apiResource('/video_download_mappings', App\Http\Controllers\VideoDownloadMappingController::class);

Route::apiResource('/video_stream_content_mappings', App\Http\Controllers\VideoStreamContentMappingController::class);

Route::apiResource('/watch_histories', App\Http\Controllers\WatchHistoryController::class);

Route::apiResource('/watchlists', App\Http\Controllers\WatchlistController::class);

Route::apiResource('/webhook_calls', App\Http\Controllers\WebhookCallController::class);

Route::apiResource('/worlds', App\Http\Controllers\WorldController::class);

Route::apiResource('/activity_logs', App\Http\Controllers\API\ActivityLogController::class);

Route::apiResource('/addresses', App\Http\Controllers\API\AddressController::class);

Route::apiResource('/avatars', App\Http\Controllers\API\AvatarController::class);

Route::apiResource('/banners', App\Http\Controllers\API\BannerController::class);

Route::apiResource('/cast_crews', App\Http\Controllers\API\CastCrewController::class);

Route::apiResource('/cities', App\Http\Controllers\API\CityController::class);

Route::apiResource('/comments', App\Http\Controllers\API\CommentController::class);

Route::apiResource('/comment_likes', App\Http\Controllers\API\CommentLikeController::class);

Route::apiResource('/constants', App\Http\Controllers\API\ConstantController::class);

Route::apiResource('/continue_watches', App\Http\Controllers\API\ContinueWatchController::class);

Route::apiResource('/countries', App\Http\Controllers\API\CountryController::class);

Route::apiResource('/coupons', App\Http\Controllers\API\CouponController::class);

Route::apiResource('/coupon_subscription_plans', App\Http\Controllers\API\CouponSubscriptionPlanController::class);

Route::apiResource('/currencies', App\Http\Controllers\API\CurrencyController::class);

Route::apiResource('/devices', App\Http\Controllers\API\DeviceController::class);

Route::apiResource('/entertainments', App\Http\Controllers\API\EntertainmentController::class);

Route::apiResource('/entertainment_country_mappings', App\Http\Controllers\API\EntertainmentCountryMappingController::class);

Route::apiResource('/entertainment_downloads', App\Http\Controllers\API\EntertainmentDownloadController::class);

Route::apiResource('/entertainment_download_mappings', App\Http\Controllers\API\EntertainmentDownloadMappingController::class);

Route::apiResource('/entertainment_gener_mappings', App\Http\Controllers\API\EntertainmentGenerMappingController::class);

Route::apiResource('/entertainment_stream_content_mappings', App\Http\Controllers\API\EntertainmentStreamContentMappingController::class);

Route::apiResource('/entertainment_talent_mappings', App\Http\Controllers\API\EntertainmentTalentMappingController::class);

Route::apiResource('/entertainment_views', App\Http\Controllers\API\EntertainmentViewController::class);

Route::apiResource('/episodes', App\Http\Controllers\API\EpisodeController::class);

Route::apiResource('/episode_stream_content_mappings', App\Http\Controllers\API\EpisodeStreamContentMappingController::class);

Route::apiResource('/episode_download_mappings', App\Http\Controllers\API\EpisodeDownloadMappingController::class);

Route::apiResource('/failed_jobs', App\Http\Controllers\API\FailedJobController::class);

Route::apiResource('/faqs', App\Http\Controllers\API\FaqController::class);

Route::apiResource('/filemanagers', App\Http\Controllers\API\FilemanagerController::class);

Route::apiResource('/genres', App\Http\Controllers\API\GenreController::class);

Route::apiResource('/home_sliders', App\Http\Controllers\API\HomeSliderController::class);

Route::apiResource('/installers', App\Http\Controllers\API\InstallerController::class);

Route::apiResource('/jobs', App\Http\Controllers\API\JobController::class);

Route::apiResource('/job_batches', App\Http\Controllers\API\JobBatchController::class);

Route::apiResource('/languages', App\Http\Controllers\API\LanguageController::class);

Route::apiResource('/likes', App\Http\Controllers\API\LikeController::class);

Route::apiResource('/livetvs', App\Http\Controllers\API\LivetvController::class);

Route::apiResource('/live_tv_categories', App\Http\Controllers\API\LiveTvCategoryController::class);

Route::apiResource('/live_tv_channels', App\Http\Controllers\API\LiveTvChannelController::class);

Route::apiResource('/live_tv_stream_content_mappings', App\Http\Controllers\API\LiveTvStreamContentMappingController::class);

Route::apiResource('/media', App\Http\Controllers\API\MediaController::class);

Route::apiResource('/mobile_settings', App\Http\Controllers\API\MobileSettingController::class);

Route::apiResource('/model_has_permissions', App\Http\Controllers\API\ModelHasPermissionController::class);

Route::apiResource('/model_has_roles', App\Http\Controllers\API\ModelHasRoleController::class);

Route::apiResource('/notifications', App\Http\Controllers\API\NotificationController::class);

Route::apiResource('/notification_templates', App\Http\Controllers\API\NotificationTemplateController::class);

Route::apiResource('/notification_template_content_mappings', App\Http\Controllers\API\NotificationTemplateContentMappingController::class);

Route::apiResource('/pages', App\Http\Controllers\API\PageController::class);

Route::apiResource('/password_resets', App\Http\Controllers\API\PasswordResetController::class);

Route::apiResource('/permissions', App\Http\Controllers\API\PermissionController::class);

Route::apiResource('/personal_access_tokens', App\Http\Controllers\API\PersonalAccessTokenController::class);

Route::apiResource('/plans', App\Http\Controllers\API\PlanController::class);

Route::apiResource('/planlimitations', App\Http\Controllers\API\PlanlimitationController::class);

Route::apiResource('/planlimitation_mappings', App\Http\Controllers\API\PlanlimitationMappingController::class);

Route::apiResource('/reviews', App\Http\Controllers\API\ReviewController::class);

Route::apiResource('/roles', App\Http\Controllers\API\RoleController::class);

Route::apiResource('/role_has_permissions', App\Http\Controllers\API\RoleHasPermissionController::class);

Route::apiResource('/seasons', App\Http\Controllers\API\SeasonController::class);

Route::apiResource('/service_providers', App\Http\Controllers\API\ServiceProviderController::class);

Route::apiResource('/sessions', App\Http\Controllers\API\SessionController::class);

Route::apiResource('/settings', App\Http\Controllers\API\SettingController::class);

Route::apiResource('/settings', App\Http\Controllers\API\SettingsController::class);

Route::apiResource('/shorts', App\Http\Controllers\API\ShortController::class);

Route::apiResource('/slider_items', App\Http\Controllers\API\SliderItemController::class);

Route::apiResource('/states', App\Http\Controllers\API\StateController::class);

Route::apiResource('/subscriptions', App\Http\Controllers\API\SubscriptionController::class);

Route::apiResource('/subscriptions_transactions', App\Http\Controllers\API\SubscriptionsTransactionController::class);

Route::apiResource('/subtitles', App\Http\Controllers\API\SubtitleController::class);

Route::apiResource('/taxes', App\Http\Controllers\API\TaxeController::class);

Route::apiResource('/tv_login_sessions', App\Http\Controllers\API\TvLoginSessionController::class);

Route::apiResource('/users', App\Http\Controllers\API\UserController::class);

Route::apiResource('/user_coupon_redeems', App\Http\Controllers\API\UserCouponRedeemController::class);

Route::apiResource('/user_multi_profiles', App\Http\Controllers\API\UserMultiProfileController::class);

Route::apiResource('/user_profiles', App\Http\Controllers\API\UserProfileController::class);

Route::apiResource('/user_providers', App\Http\Controllers\API\UserProviderController::class);

Route::apiResource('/user_reminders', App\Http\Controllers\API\UserReminderController::class);

Route::apiResource('/user_search_histories', App\Http\Controllers\API\UserSearchHistoryController::class);

Route::apiResource('/user_watch_histories', App\Http\Controllers\API\UserWatchHistoryController::class);

Route::apiResource('/videos', App\Http\Controllers\API\VideoController::class);

Route::apiResource('/video_download_mappings', App\Http\Controllers\API\VideoDownloadMappingController::class);

Route::apiResource('/video_stream_content_mappings', App\Http\Controllers\API\VideoStreamContentMappingController::class);

Route::apiResource('/watch_histories', App\Http\Controllers\API\WatchHistoryController::class);

Route::apiResource('/watchlists', App\Http\Controllers\API\WatchlistController::class);

Route::apiResource('/webhook_calls', App\Http\Controllers\API\WebhookCallController::class);

Route::apiResource('/worlds', App\Http\Controllers\API\WorldController::class);
