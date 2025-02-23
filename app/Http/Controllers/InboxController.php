<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Services\GmailService;

class InboxController extends Controller
{
    public function index(): Response
    {
        $user = auth()->user();
        $gmailService = new GmailService($user);
        $emails = $gmailService->fetchEmailList();
        $emails = $gmailService->hydrateEmailListwithEmails($emails);

        return Inertia::render('Inbox/Index');
    }

    public function show($id): Response
    {
        return Inertia::render('Inbox/Show', [
            'id' => $id,
        ]);
    }
}
