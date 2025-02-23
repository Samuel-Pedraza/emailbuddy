<?php

namespace App\Providers;

use App\Services\SchemaOrg;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('shopify', \SocialiteProviders\Shopify\Provider::class);
        });
        // View::share(['schema' => ['organization' => app(SchemaOrg::class)->organization()]]);
    }
}
