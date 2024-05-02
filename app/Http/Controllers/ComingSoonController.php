<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComingSoonRequest;
use App\Models\ComingSoonEmail;
use Illuminate\Http\Request;

class ComingSoonController extends Controller
{
    public function index(ComingSoonRequest $request)
    {
        ComingSoonEmail::create([
            'email' => $request->get('email'),
        ]);

        return redirect()->back()->banner('Thanks for subscription! We will keep you updated.');
    }
}
