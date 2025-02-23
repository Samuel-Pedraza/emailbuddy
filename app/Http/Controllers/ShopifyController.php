<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ShopifyController extends Controller
{
    public function redirectToShopify()
    {
        return Socialite::driver('shopify')
        ->with(['shop' => 'shopify.com'])
        ->redirect();
    }

    public function handleShopifyCallback()
    {
        $user = Socialite::driver('shopify')->user();

        auth()->user()->update([
            'shopify_auth_token' => $user->token,
        ]);

        return redirect('/dashboard');
    }

}
