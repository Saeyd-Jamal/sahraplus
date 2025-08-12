<?php

use App\Http\Controllers\Auth\API\AuthController;
use App\Http\Controllers\Backend\API\DashboardController;
use App\Http\Controllers\Backend\API\NotificationsController;
use App\Http\Controllers\Backend\API\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WatchHistorieController;
use Modules\Frontend\Http\Controllers\QueryOptimizeController;

use Modules\User\Http\Controllers\API\UserController;
use Modules\Entertainment\Http\Controllers\API\EntertainmentsController;
use Modules\LiveTV\Http\Controllers\API\LiveTVsController;
use App\Http\Controllers\TvAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('user-detail', [AuthController::class, 'userDetails']);

Route::get('/optimize', [QueryOptimizeController::class, 'optimize'])->name('optimize');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('social-login', 'socialLogin');
    Route::post('forgot-password', 'forgotPassword');
    Route::get('logout', 'logout');
});
Route::post('/store-access-token', [SettingController::class, 'storeToken']);
Route::post('/token-revoke', [SettingController::class, 'revokeToken']);

Route::get('dashboard-detail', [DashboardController::class, 'DashboardDetail']);
Route::get('dashboard-detail-data', [DashboardController::class, 'DashboardDetailData']);
Route::get('get-tranding-data', [DashboardController::class, 'getTrandingData']);
// Route::get('/movies', [DashboardController::class, 'getMovieData']);
// Route::get('/tvshows', [DashboardController::class, 'getTvShowData']);
Route::get('/banner-data', [DashboardController::class, 'getEntertainmentData']);
Route::get('v2/dashboard-detail-data', [DashboardController::class, 'DashboardDetailDataV2']);
Route::get('v2/dashboard-detail', [DashboardController::class, 'DashboardDetailV2']);
Route::get('v2/episode-details', [EntertainmentsController::class, 'episodeDetailsV2']);
Route::get('v2/livetv-dashboard', [LiveTVsController::class, 'liveTvDashboardV2']);
Route::get('v2/tvshow-details', [EntertainmentsController::class, 'tvshowDetailsV2']);
Route::get('v2/movie-details', [EntertainmentsController::class, 'movieDetailsV2']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('setting', SettingController::class);
    Route::apiResource('notification', NotificationsController::class);
    Route::get('notification-list', [NotificationsController::class, 'notificationList']);
    Route::get('gallery-list', [DashboardController::class, 'globalGallery']);
    Route::get('search-list', [DashboardController::class, 'searchList']);
    Route::post('update-profile', [AuthController::class, 'updateProfile']);

    Route::post('change-password', [AuthController::class, 'changePassword']);
    Route::post('delete-account', [AuthController::class, 'deleteAccount']);

    Route::get('vendor-dashboard-list', [DashboardController::class, 'VendorDashboardDetail']);

    ### v2 api`s

    Route::get('v2/profile-details', [UserController::class, 'profileDetailsV2']);
    // Route::get('v2/dashboard-detail-data', [DashboardController::class, 'DashboardDetailDataV2']);
    // Route::get('v2/dashboard-detail', [DashboardController::class, 'DashboardDetailV2']);
    // Route::get('v2/episode-details', [EntertainmentsController::class, 'episodeDetailsV2']);
    // Route::get('v2/livetv-dashboard', [LiveTVsController::class, 'liveTvDashboardV2']);
    // Route::get('v2/tvshow-details', [EntertainmentsController::class, 'tvshowDetailsV2']);

    // Route::get('v2/movie-details', [EntertainmentsController::class, 'movieDetailsV2']);
    Route::post('/change-pin', [AuthController::class, 'changePin'])->name('change-pin');
    Route::get('/send-otp', [AuthController::class, 'sendOtp'])->name('send-otp');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify-otp');
    Route::post('/verify-pin', [AuthController::class, 'verifyPin'])->name('verify-pin');

    Route::post('/update-parental-lock', [AuthController::class, 'changeParentalLock'])->name('update-parental-lock');
    // Route::post('/link-tv', [TvAuthController::class, 'linkTv'])->name('link-tv');
    Route::post('/tv/confrim-session', [TvAuthController::class, 'confirmSession'])->name('confirmSession');

});
Route::get('app-configuration', [SettingController::class, 'appConfiguraton']);

Route::prefix('tv')->group(function () {
    Route::get('/initiate-session', [TvAuthController::class, 'initiateSession']);
    Route::post('/check-session', [TvAuthController::class, 'checkSession']);
});



route::get('slider', [SliderController::class, 'apislider']);
Route::middleware('auth:sanctum')->post('watch-history', [WatchHistorieController::class, 'store']);
use Illuminate\Support\Facades\Route;
use Modules\Banner\Http\Controllers\API\BannersController;

Route::get('/banners', [BannersController::class, 'getBanners']);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\CastCrew\Http\Controllers\API\CastCrewController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::get('castcrew-list', [CastCrewController::class, 'castCrewList']);

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('castcrew', fn (Request $request) => $request->user())->name('castcrew');
});



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Coupon\Http\Controllers\API\CouponController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::group(['middleware' => 'auth:sanctum'], function () {

    // Coupon API routes
        Route::get('/', [CouponController::class, 'index'])->name('coupons.index');
        Route::post('/store-coupons', [CouponController::class, 'store'])->name('coupons.store');
        Route::get('coupon-list', [CouponController::class, 'couponlist'])->name('couponlist');
        Route::put('update/{id}', [CouponController::class, 'update'])->name('coupons.update');
        Route::delete('destroy/{id}', [CouponController::class, 'destroy'])->name('coupons.destroy');
});



use Illuminate\Support\Facades\Route;
use Modules\Entertainment\Http\Controllers\API\EntertainmentsController;
use Modules\Entertainment\Http\Controllers\API\WatchlistController;
use Modules\Entertainment\Http\Controllers\API\ReviewController;


Route::get('get-rating', [ReviewController::class, 'getRating']);
Route::get('movie-list', [EntertainmentsController::class, 'movieList']);
Route::get('v2/movie-list', [EntertainmentsController::class, 'movieListV2']);
Route::get('movie-details', [EntertainmentsController::class, 'movieDetails']);
Route::get('tvshow-list', [EntertainmentsController::class, 'tvshowList']);
Route::get('v2/tvshow-list', [EntertainmentsController::class, 'tvshowListV2']);
Route::get('tvshow-details', [EntertainmentsController::class, 'tvshowDetails']);
Route::get('episode-list', [EntertainmentsController::class, 'episodeList']);
Route::get('episode-details', [EntertainmentsController::class, 'episodeDetails']);
Route::get('search-list', [EntertainmentsController::class, 'searchList']);
Route::get('get-search', [EntertainmentsController::class, 'getSearch']);
Route::get('coming-soon', [EntertainmentsController::class, 'comingSoon']);


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('watch-list', [WatchlistController::class, 'watchList']);
    Route::post('save-watchlist', [WatchlistController::class, 'saveWatchList']);
    Route::post('delete-watchlist', [WatchlistController::class, 'deleteWatchList']);

    Route::post('save-rating', [ReviewController::class, 'saveRating'])->name('save-rating');
    Route::post('delete-rating', [ReviewController::class, 'deleteRating'])->name('delete-rating');
    Route::put('update-rating', [ReviewController::class, 'update'])->name('update-rating');

    Route::post('save-likes', [ReviewController::class, 'saveLikes']);
    Route::post('save-download', [EntertainmentsController::class, 'saveDownload']);
    Route::post('delete-download', [EntertainmentsController::class, 'deleteDownload']);


    Route::get('continuewatch-list', [WatchlistController::class, 'continuewatchList']);
    Route::post('save-continuewatch', [WatchlistController::class, 'saveContinueWatch']);
    Route::post('delete-continuewatch', [WatchlistController::class, 'deleteContinueWatch']);

    Route::post('save-reminder', [EntertainmentsController::class, 'saveReminder']);
    Route::post('delete-reminder', [EntertainmentsController::class, 'deleteReminder']);

    Route::post('save-entertainment-views', [EntertainmentsController::class, 'saveEntertainmentViews']);
});
?>





use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\DashboardController;
use Modules\Frontend\Http\Controllers\MovieController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/


Route::get('top-10-movie', [DashboardController::class, 'Top10Movies']);
Route::get('latest-movie', [DashboardController::class, 'LatestMovies']);
Route::get('fetch-languages', [DashboardController::class, 'FetchLanguages']);
Route::get('popular-movie', [DashboardController::class, 'PopularMovies']);
Route::get('top-channels', [DashboardController::class, 'TopChannels']);
Route::get('popular-tvshows', [DashboardController::class, 'PopularTVshows']);
Route::get('favorite-personality', [DashboardController::class, 'favoritePersonality']);
Route::get('free-movie', [DashboardController::class, 'FreeMovies']);
Route::get('get-gener', [DashboardController::class, 'GetGener']);
Route::get('get-video', [DashboardController::class, 'GetVideo']);
Route::get('base-on-last-watch-movie', [DashboardController::class, 'GetLastWatchContent']);
Route::get('most-like-movie', [DashboardController::class, 'MostLikeMoive']);
Route::get('most-view-movie', [DashboardController::class, 'MostviewMoive']);
Route::get('country-tranding-movie', [DashboardController::class, 'TrandingInCountry']);
Route::get('favorite-genres', [DashboardController::class, 'FavoriteGenres']);
Route::get('user-favorite-personality', [DashboardController::class, 'UserfavoritePersonality']);

Route::get('web-continuewatch-list', [DashboardController::class, 'ContinuewatchList']);

Route::get('get-pinpopup/{id}', [DashboardController::class, 'getPinpopup']);

Route::get('v2/web-continuewatch-list', [DashboardController::class, 'ContinuewatchListV2']);
Route::get('v2/top-10-movie', [DashboardController::class, 'Top10MoviesV2']);




Route::get('subtitle', [MovieController::class, 'subtitle']);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Genres\Http\Controllers\Api\GenersController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('genres', fn (Request $request) => $request->user())->name('genres');
});

Route::get('genre-list', [GenersController::class, 'genreList']);

use Illuminate\Support\Facades\Route;
use Modules\LiveTV\Http\Controllers\API\LiveTVsController;

Route::get('livetv-category-list', [LiveTVsController::class, 'liveTvCategoryList']);
Route::get('livetv-dashboard', [LiveTVsController::class, 'liveTvDashboard']);
Route::get('livetv-details', [LiveTVsController::class, 'liveTvDetails']);
Route::get('channel-list', [LiveTVsController::class, 'channelList']);

Route::group(['middleware' => 'auth:sanctum'], function () {

});
?>




use Illuminate\Support\Facades\Route;
use Modules\Page\Http\Controllers\API\PagesController;

Route::get('page-list', [PagesController::class, 'pageList']);
Route::get('faq-list', [PagesController::class, 'faqList']);



?>



use Illuminate\Support\Facades\Route;
use Modules\Subscriptions\Http\Controllers\Backend\API\PlanController;
use Modules\Subscriptions\Http\Controllers\Backend\API\PlanLimitationController;
use Modules\Subscriptions\Http\Controllers\Backend\API\SubscriptionController;

Route::apiResource('planlimitation', PlanLimitationController::class);
Route::apiResource('plans', PlanController::class);

Route::get('plan-list', [PlanController::class, 'planList']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/save-subscription-details', [SubscriptionController::class, 'saveSubscriptionDetails']);
    Route::get('/user-subscription_histroy', [SubscriptionController::class, 'getUserSubscriptionHistroy']);
    Route::post('/cancle-subscription', [SubscriptionController::class, 'cancelSubscription']);
});
?>





use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\API\UserController;
use Modules\User\Http\Controllers\API\UserMultiProfileController;
use Modules\User\Http\Controllers\API\UserSearchHistoryController;


Route::get('device-logout-data', [UserController::class, 'deviceLogout']);
Route::get('logout-all-data', [UserController::class, 'logoutAll']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('profile-details', [UserController::class, 'profileDetails']);
    Route::get('account-setting', [UserController::class, 'accountSetting']);
    Route::get('device-logout', [UserController::class, 'deviceLogout']);
    Route::get('logout-all', [UserController::class, 'logoutAll']);
    Route::get('delete-account', [UserController::class, 'deleteAccount']);

    Route::get('user-profile-list', [UserMultiProfileController::class, 'profileList']);
    Route::post('save-userprofile', [UserMultiProfileController::class, 'saveProfile']);
    Route::get('get-userprofile/{id}', [UserMultiProfileController::class, 'getprofile']);
    Route::post('delete-userprofile', [UserMultiProfileController::class, 'deleteProfile']);

    Route::get('select-userprofile/{id}', [UserMultiProfileController::class, 'SelectProfile']);
    Route::post('/father/code', [UserController::class, 'fathercode'])->name('fathercode');
    Route::post('/verify-father-code', [UserController::class, 'verifyfathercode'])->name('verifyfathercode');



    Route::get('search-list', [UserSearchHistoryController::class, 'searchHistoryList']);
    Route::post('save-search', [UserSearchHistoryController::class, 'saveSearchHistory']);
    Route::get('delete-search', [UserSearchHistoryController::class, 'deleteSearchHistory']);

    Route::post('save-watch-content', [UserController::class, 'saveWatchHistory']);


});
?>


use Illuminate\Support\Facades\Route;
use Modules\Video\Http\Controllers\API\VideosController;

Route::get('video-list', [VideosController::class, 'videoList']);
Route::get('video-details', [VideosController::class, 'videoDetails']);




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
