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

    /**
     * @throws \JsonException
     */
    public function productCheckout(Request $request, $priceId)
    {
        $checkout = $request->user()->checkout($priceId)
            ->returnTo(route('dashboard'));

        return \response()->json([
            'items' => json_encode($checkout->getItems(), JSON_THROW_ON_ERROR),
            'paddle_id' => $checkout->getCustomer()->paddle_id,
            'custom' => json_encode($checkout->getCustomData(), JSON_THROW_ON_ERROR),
            'return_url' => $checkout->getReturnUrl(),
        ]);
    }

    public function billing(Request $request): Response
    {
        $url = $request->user()->customerPortalUrl();

        return Inertia::location($url);
    }
}
