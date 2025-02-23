<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class InboxController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Inbox/Index');
    }

    public function show($id): Response
    {
        return Inertia::render('Inbox/Show', [
            'id' => $id,
        ]);
    }
}
