<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(Request $request): Response
    {
        $checkout = $request->user()->checkout('pri_01ht4q7xjjbgmeyxr7sgkmzkmt')
            ->returnTo(route('dashboard'));

        $checkout = [
            'items' => json_encode($checkout->getItems(), JSON_THROW_ON_ERROR),
            'paddle_id' => $checkout->getCustomer()->paddle_id,
            'custom' => json_encode($checkout->getCustomData(), JSON_THROW_ON_ERROR),
            'return_url' => $checkout->getReturnUrl(),
        ];

        return Inertia::render('Home', [
            'checkout' => $checkout,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
