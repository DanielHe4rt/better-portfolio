<?php

namespace App\Models\Skill;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'name',
        'type_id',
        'time_id',
        'comment',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function time(): BelongsTo
    {
        return $this->belongsTo(Time::class);
    }
}
