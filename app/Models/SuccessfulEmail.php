<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessfulEmail extends Model
{
    protected $table = 'successful_emails';

    protected $fillable = [
        'affiliate_id', 'envelope', 'from', 'subject', 'dkim', 'SPF', 'spam_score', 'email', 'raw_text', 'sender_ip', 'to', 'timestamp'
    ];
}
