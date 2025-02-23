<?php

namespace App\Services;

use App\Models\User;
use Google\Client as GoogleClient;
use Google\Service\Gmail;
use Google\Service\Gmail\ListMessagesResponse;
use Illuminate\Support\Arr;

class GmailService
{

    const SCOPE_ALL = 'https://mail.google.com/';
    const AUTH_USER = 'me';
    const APPLICATION_NAME = 'Gmail API';

    const LABEL_INBOX = 'INBOX';

    protected GoogleClient $client;
    protected Gmail $gmailService;

    public function __construct(User $user)
    {
        $this->client = new GoogleClient();
        $this->client->setApplicationName(self::APPLICATION_NAME);
        $this->client->setScopes([self::SCOPE_ALL]);
        $this->client->setAccessToken($user->google_auth_token);
        $this->gmailService = new Gmail($this->client);
    }

    public function fetchEmailList(): ListMessagesResponse
    {
        return $this->gmailService->users_messages->listUsersMessages(self::AUTH_USER, ['labelIds' => self::LABEL_INBOX, 'maxResults' => 10]);
    }

    public function hydrateEmailListwithEmails($emailList): Array
    {
        $emails = [];
        foreach ($emailList as $email) {
            $emails[] = $this->gmailService->users_messages->get(self::AUTH_USER, $email->id);
        }

        return $emails;
    }


}
