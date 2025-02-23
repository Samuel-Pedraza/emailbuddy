<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
        ->scopes(['https://mail.google.com/'])
        ->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        auth()->user()->update([
            'google_auth_token' => $user->token,
        ]);

        return redirect('/dashboard');
    }

}
