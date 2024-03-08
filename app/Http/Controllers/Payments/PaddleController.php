<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class PaddleController extends Controller
{
    public function subscriptionCheckout(Request $request, $product, $variant)
    {
        $user = $request->user();

        if ($user->subscription()?->hasVariant($variant)) {
            return redirect()->back()->dangerBanner('You are already subscribed to that plan');
        }

        if ($user->subscribed() && $user->subscription()?->valid()) {
            $user->subscription()
                ?->load('owner')
                ->endTrial()
                ->swap($product, $variant);

            // Replace back() with the route where user should be redirected after successful subscription
            return redirect()->back()->banner('You have successfully subscribed to '.$variant.' plan');
        }

        return $user->subscribe($variant);
    }

    public function productCheckout(Request $request, $priceId)
    {
        $checkout = $request->user()->checkout($priceId)
            ->returnTo(route('dashboard'));

        return $checkout->getItems();
    }

    public function billing(Request $request): Response
    {
        $url = $request->user()->customerPortalUrl();

        return Inertia::location($url);
    }
}
