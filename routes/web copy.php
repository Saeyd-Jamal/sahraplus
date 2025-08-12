<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {return view('welcome');})->name('home');


require __DIR__ . '/dashboard.php';

Route::resource('/activity_logs', App\Http\Controllers\ActivityLogController::class);

Route::resource('/addresses', App\Http\Controllers\AddressController::class);

Route::resource('/avatars', App\Http\Controllers\AvatarController::class);

Route::resource('/banners', App\Http\Controllers\BannerController::class);

Route::resource('/cast_crews', App\Http\Controllers\CastCrewController::class);

Route::resource('/cities', App\Http\Controllers\CityController::class);

Route::resource('/comments', App\Http\Controllers\CommentController::class);

Route::resource('/comment_likes', App\Http\Controllers\CommentLikeController::class);

Route::resource('/constants', App\Http\Controllers\ConstantController::class);

Route::resource('/continue_watches', App\Http\Controllers\ContinueWatchController::class);

Route::resource('/countries', App\Http\Controllers\CountryController::class);

Route::resource('/coupons', App\Http\Controllers\CouponController::class);

Route::resource('/coupon_subscription_plans', App\Http\Controllers\CouponSubscriptionPlanController::class);

Route::resource('/currencies', App\Http\Controllers\CurrencyController::class);

Route::resource('/devices', App\Http\Controllers\DeviceController::class);

Route::resource('/entertainments', App\Http\Controllers\EntertainmentController::class);

Route::resource('/entertainment_country_mappings', App\Http\Controllers\EntertainmentCountryMappingController::class);

Route::resource('/entertainment_downloads', App\Http\Controllers\EntertainmentDownloadController::class);

Route::resource('/entertainment_download_mappings', App\Http\Controllers\EntertainmentDownloadMappingController::class);

Route::resource('/entertainment_gener_mappings', App\Http\Controllers\EntertainmentGenerMappingController::class);

Route::resource('/entertainment_stream_content_mappings', App\Http\Controllers\EntertainmentStreamContentMappingController::class);

Route::resource('/entertainment_talent_mappings', App\Http\Controllers\EntertainmentTalentMappingController::class);

Route::resource('/entertainment_views', App\Http\Controllers\EntertainmentViewController::class);

Route::resource('/episodes', App\Http\Controllers\EpisodeController::class);

Route::resource('/episode_download_mappings', App\Http\Controllers\EpisodeDownloadMappingController::class);

Route::resource('/episode_stream_content_mappings', App\Http\Controllers\EpisodeStreamContentMappingController::class);

Route::resource('/failed_jobs', App\Http\Controllers\FailedJobController::class);

Route::resource('/faqs', App\Http\Controllers\FaqController::class);

Route::resource('/filemanagers', App\Http\Controllers\FilemanagerController::class);

Route::resource('/genres', App\Http\Controllers\GenreController::class);

Route::resource('/home_sliders', App\Http\Controllers\HomeSliderController::class);

Route::resource('/installers', App\Http\Controllers\InstallerController::class);

Route::resource('/jobs', App\Http\Controllers\JobController::class);

Route::resource('/job_batches', App\Http\Controllers\JobBatchController::class);

Route::resource('/languages', App\Http\Controllers\LanguageController::class);

Route::resource('/likes', App\Http\Controllers\LikeController::class);

Route::resource('/livetvs', App\Http\Controllers\LivetvController::class);

Route::resource('/live_tv_categories', App\Http\Controllers\LiveTvCategoryController::class);

Route::resource('/live_tv_channels', App\Http\Controllers\LiveTvChannelController::class);

Route::resource('/live_tv_stream_content_mappings', App\Http\Controllers\LiveTvStreamContentMappingController::class);

Route::resource('/media', App\Http\Controllers\MediaController::class);

Route::resource('/mobile_settings', App\Http\Controllers\MobileSettingController::class);

Route::resource('/model_has_permissions', App\Http\Controllers\ModelHasPermissionController::class);

Route::resource('/model_has_roles', App\Http\Controllers\ModelHasRoleController::class);

Route::resource('/notifications', App\Http\Controllers\NotificationController::class);

Route::resource('/notification_templates', App\Http\Controllers\NotificationTemplateController::class);

Route::resource('/notification_template_content_mappings', App\Http\Controllers\NotificationTemplateContentMappingController::class);

Route::resource('/pages', App\Http\Controllers\PageController::class);

Route::resource('/password_resets', App\Http\Controllers\PasswordResetController::class);

Route::resource('/permissions', App\Http\Controllers\PermissionController::class);

Route::resource('/personal_access_tokens', App\Http\Controllers\PersonalAccessTokenController::class);

Route::resource('/plans', App\Http\Controllers\PlanController::class);

Route::resource('/planlimitations', App\Http\Controllers\PlanlimitationController::class);

Route::resource('/planlimitation_mappings', App\Http\Controllers\PlanlimitationMappingController::class);

Route::resource('/reviews', App\Http\Controllers\ReviewController::class);

Route::resource('/roles', App\Http\Controllers\RoleController::class);

Route::resource('/role_has_permissions', App\Http\Controllers\RoleHasPermissionController::class);

Route::resource('/seasons', App\Http\Controllers\SeasonController::class);

Route::resource('/service_providers', App\Http\Controllers\ServiceProviderController::class);

Route::resource('/sessions', App\Http\Controllers\SessionController::class);

Route::resource('/settings', App\Http\Controllers\SettingController::class);

Route::resource('/settings', App\Http\Controllers\SettingsController::class);

Route::resource('/shorts', App\Http\Controllers\ShortController::class);

Route::resource('/slider_items', App\Http\Controllers\SliderItemController::class);

Route::resource('/states', App\Http\Controllers\StateController::class);

Route::resource('/subscriptions', App\Http\Controllers\SubscriptionController::class);

Route::resource('/subscriptions_transactions', App\Http\Controllers\SubscriptionsTransactionController::class);

Route::resource('/subtitles', App\Http\Controllers\SubtitleController::class);

Route::resource('/taxes', App\Http\Controllers\TaxeController::class);

Route::resource('/tv_login_sessions', App\Http\Controllers\TvLoginSessionController::class);

Route::resource('/users', App\Http\Controllers\UserController::class);

Route::resource('/user_coupon_redeems', App\Http\Controllers\UserCouponRedeemController::class);

Route::resource('/user_multi_profiles', App\Http\Controllers\UserMultiProfileController::class);

Route::resource('/user_profiles', App\Http\Controllers\UserProfileController::class);

Route::resource('/user_providers', App\Http\Controllers\UserProviderController::class);

Route::resource('/user_reminders', App\Http\Controllers\UserReminderController::class);

Route::resource('/user_search_histories', App\Http\Controllers\UserSearchHistoryController::class);

Route::resource('/user_watch_histories', App\Http\Controllers\UserWatchHistoryController::class);

Route::resource('/videos', App\Http\Controllers\VideoController::class);

Route::resource('/video_download_mappings', App\Http\Controllers\VideoDownloadMappingController::class);

Route::resource('/video_stream_content_mappings', App\Http\Controllers\VideoStreamContentMappingController::class);

Route::resource('/watch_histories', App\Http\Controllers\WatchHistoryController::class);

Route::resource('/watchlists', App\Http\Controllers\WatchlistController::class);

Route::resource('/webhook_calls', App\Http\Controllers\WebhookCallController::class);

Route::resource('/worlds', App\Http\Controllers\WorldController::class);
