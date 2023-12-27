<?php

namespace App\Models\Mailer;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'mail_status';

    protected $fillable = [
        'name',
        'type',
    ];
}
