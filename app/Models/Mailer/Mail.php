<?php

namespace App\Models\Mailer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $table = 'mails';

    protected $fillable = [
        'id',
        'email',
        'name',
        'subject',
        'content',
        'status_id',
        'ip',
        'user_agent',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
