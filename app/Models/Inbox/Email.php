<?php

namespace App\Models\Inbox;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'from',
        'to',
        'subject',
        'body',
        'read_at',
    ];
}
