<?php

use App\Http\Controllers\Auth\MagicLinkController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LemonSqueezyController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\StripeController;
use App\Http\Middleware\Subscribed;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('sitemap', [SitemapController::class, 'index'])->name('sitemap');

Route::prefix('auth')->group(function () {
    Route::get('/redirect/{driver}', [SocialiteController::class, 'redirect'])
        ->name('socialite.redirect');
    Route::get('/callback/{driver}', [SocialiteController::class, 'callback'])
        ->name('socialite.callback');

    // Magic Links
    Route::post('/magic-link', [MagicLinkController::class, 'sendMagicLink'])->name('magic.link');
    Route::get('/magic-link/{token}', [MagicLinkController::class, 'loginWithMagicLink'])->name('magic.link.login');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{article:slug}', [BlogController::class, 'article'])->name('blog.article');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Here goes your auth user endpoints
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('stripe')->name('stripe.')->group(function () {
        Route::get('subscription-checkout/{price}', [StripeController::class, 'subscriptionCheckout'])->name('subscription.checkout');
        // If your product checkout does not require auth user,
        // move this part outside "auth:sanctum" middleware and change the logic inside method
        Route::get('product-checkout/{price}', [StripeController::class, 'productCheckout'])->name('product.checkout');
        Route::get('success', [StripeController::class, 'success'])->name('success');
        Route::get('error', [StripeController::class, 'error'])->name('error');
        Route::get('billing', [StripeController::class, 'billing'])->name('billing'); // Redirects to Customer Portal
    });

    Route::prefix('lemonsqueezy')->name('lemonsqueezy.')->group(function () {
        Route::get('subscription-checkout/{productId}/{variantId}', [LemonSqueezyController::class, 'subscriptionCheckout'])->name('subscription.checkout');
        // If your product checkout does not require auth user,
        // move this part outside "auth:sanctum" middleware and change the logic inside method
        Route::get('product-checkout/{variantId}', [LemonSqueezyController::class, 'productCheckout'])->name('product.checkout');
        Route::get('billing', [LemonSqueezyController::class, 'billing'])->name('billing'); // Redirects to Customer Portal
    });

    Route::middleware([Subscribed::class])->group(function () {
        // Add endpoints that are only for subscribed users
    });
});
