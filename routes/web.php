<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Backend\AdminOrderController;
use App\Http\Controllers\Backend\AuthenticationController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Common\DashboardController;
use App\Http\Controllers\Backend\PrivacyTermController;
use App\Http\Controllers\Backend\StudioController;
use App\Http\Controllers\Backend\SubscribeRequestController;
use App\Http\Controllers\Backend\TopGalleryController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\UserController as FrontUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Fontend Website Route List
|
*/

Route::get('/', [HomePageController::class, 'home'])->name('home');
Route::get('/terms', [HomePageController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [HomePageController::class, 'privacyPolicy'])->name('privacy-policy');

Route::get('/social-login/{service}', [FrontUserController::class, 'redirectToSocial'])->name('login.social');
Route::get('/social-login/{service}/callback', [FrontUserController::class, 'handleSocialCallback']);
Route::post('/subscribe/validation', [SubscribeRequestController::class, 'SubscribeValidate'])->name('subscribe_validation');

Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/user-dashboard', [FrontUserController::class, 'userDashboard'])->name('user-dashboard');
    Route::resource('orders', OrderController::class);
    Route::post('/validate-form', [OrderController::class, 'validateForm'])->name('validate_form');
    Route::get('/user/password-update', [FrontUserController::class, 'passwordUpdate'])->name('user.password.update');
    Route::post('/user/password-update', [FrontUserController::class, 'storePasswordUpdate'])->name('user.password.update');

    Route::get('/customer-profile', [FrontUserController::class, 'customerProfile'])->name('customer_profile');
    Route::post('/customer-update', [FrontUserController::class, 'customerProfileUpdate'])->name('customer_profile_update');
    Route::post('/password-update', [FrontUserController::class, 'updatePassword'])->name('password_update');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Admin Route List
|
*/
Route::get('/admin/login', [UserController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin/login/post', [UserController::class, 'adminLoginPost'])->name('admin-login-post');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });


    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profilePage'])->name('user_frofile');
    Route::get('customers', [DashboardController::class, 'profilePage'])->name('user_frofile');

    Route::post('user-details', [DashboardController::class, 'updateUserDetails'])->name('update_user_details');
    Route::post('update-password', [DashboardController::class, 'updatePassword'])->name('update_password');
    Route::post('profile-medias/temp', [DashboardController::class, 'uploadProfileMedia'])->name('upload_profile_media_temporary');
    Route::post('profile-medias/remove', [DashboardController::class, 'removeProfileMedia'])->name('remove_profile_media_temporary');
    Route::post('profile-medias/upload', [DashboardController::class, 'profileMediaUpload'])->name('profile_media_upload');

    Route::get('settings', [SettingController::class, 'settingPage'])->name('settings');
    Route::post('logo-medias/temp', [SettingController::class, 'uploadLogoMedia'])->name('upload_logo_media_temporary');
    Route::post('logo-medias/remove', [SettingController::class, 'removeLogoMedia'])->name('remove_logo_media_temporary');
    // Route::post('logo-medias/upload', [SettingController::class, 'logoMediaUpload'])->name('logo_media_upload');
    Route::post('logo-medias/upload', [SettingController::class, 'store'])->name('logo_media_upload');
    // Route::post('admin-logo/upload', [SettingController::class, 'adminLogoStore'])->name('admin_logo_upload');
    /**
     * User Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('users', UserController::class);
        Route::get('users/verified/view', [UserController::class, 'verified'])->name('users.verified');
        Route::get('users/unverified/view', [UserController::class, 'unverified'])->name('users.unverified');
        Route::put('users/verify/{id}', [UserController::class, 'verify'])->name('users.verify');
        Route::put('users/blocked/{id}', [UserController::class, 'blocked'])->name('users.blocked');
        Route::put('users/unverify/{id}', [UserController::class, 'unverify'])->name('users.unverify');
        Route::put('users/unblocked/{id}', [UserController::class, 'unblocked'])->name('users.unblocked');
        // Pages Routes
        Route::get('privacy', [PrivacyTermController::class, 'index'])->name('privacy.index');
        Route::post('privacy/store', [PrivacyTermController::class, 'store'])->name('privacy.store');
        Route::get('term', [PrivacyTermController::class, 'termIndex'])->name('term.index');
        Route::get('home/index', [HomeController::class, 'homeIndex'])->name('home.index');
        Route::post('home/video/store', [HomeController::class, 'homeStore'])->name('home.store');
        Route::post('home/second/section', [HomeController::class, 'secondSection'])->name('second_section');
        Route::post('home/gallery/section', [HomeController::class, 'gallerySection'])->name('gallery_section');
        Route::post('home/top/gallery', [HomeController::class, 'topGallerySection'])->name('top_gallery_section');

        Route::get('home/subscribe/create', [HomeController::class, 'subscribeCreate'])->name('subscribe_create');
        Route::get('home/footer/create', [HomeController::class, 'footerCreate'])->name('footer_create');
        Route::post('home/subscribe/store', [HomeController::class, 'subscribeStore'])->name('subscribe_store');
        Route::post('home/footer/store', [HomeController::class, 'footerStore'])->name('footer_store');
        Route::post('home/nav/section', [HomeController::class, 'navSectionStore'])->name('nav_section');

        Route::resource('top-gallery', TopGalleryController::class);
        Route::post('gallery/header/store', [TopGalleryController::class, 'galleryHeaderUpdate'])->name('gallery_header');
        Route::resource('studio', StudioController::class);
        Route::post('studio/header/store', [StudioController::class, 'studioHeaderUpdate'])->name('studio_header');

        //auth page routes
        Route::get('auth/page', [AuthenticationController::class, 'authPage'])->name('auth_page');
        Route::post('auth/page/update', [AuthenticationController::class, 'authPageStore'])->name('auth_page_update');


        Route::resource('order', AdminOrderController::class);
        Route::post('order-delivery/{id}', [AdminOrderController::class, 'orderDelivery'])->name('order.delivery');

        Route::get('social/setting', [SettingController::class, 'social'])->name('social_link');
        Route::post('social/update', [SettingController::class, 'socialStore'])->name('social_store');
        Route::get('pricing/setting', [SettingController::class, 'pricing'])->name('pricing_setting');
        Route::post('pricing/setting', [SettingController::class, 'pricingStore']);
    });


    Route::post('/logout', [UserController::class, 'adminLogout'])->name('admin-logout');
});


require __DIR__ . '/auth.php';
