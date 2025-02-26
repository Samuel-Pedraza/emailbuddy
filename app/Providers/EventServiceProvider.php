<?php

namespace App\Providers;

use App\Listeners\LemonSqueezyEventListener;
use App\Listeners\StripeEventListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Laravel\Cashier\Events\WebhookReceived;
use LemonSqueezy\Laravel\Events\WebhookHandled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        WebhookReceived::class => [
            StripeEventListener::class,
        ],
        WebhookHandled::class => [
            LemonSqueezyEventListener::class,
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [

            \SocialiteProviders\Shopify\ShopifyExtendSocialite::class.'@handle',
        ],
        ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
