<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\Registered;
class SocialiteController extends Controller
{
    public function redirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback($driver)
    {
        $userData = Socialite::driver($driver)->user();

        // Manage your user data here and redirect users to their page
        //        $data = [
        //            'account_id' => $userData->getId(),
        //            'name' => $userData->getName(),
        //            'nickname' => $userData->getNickname(),
        //            'email' => $userData->getEmail(),
        //            'avatar' => $userData->getAvatar(),
        //            'token' => $userData->token,
        //            'token_secret' => $userData->tokenSecret ?? $userData->refreshToken,
        //        ];

        // For twitter login make sure to enable "Request email from users" option in "User authentication settings"
        $user = User::firstOrCreate(['email' => $userData->getEmail()], [
            'name' => $userData->getName(),
            'password' => Hash::make(Str::random()),
        ]);

        // Dispatch the Registered event if the user was just created
        if ($user->wasRecentlyCreated) {
            event(new Registered($user));
        }

        $user->socialAccounts()->firstOrCreate(['account_id' => $userData->getId()], [
            'provider' => $driver,
            'token' => $userData->token,
        ]);

        \Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
