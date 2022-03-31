<?php

namespace App\Entities\Articles;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'platform',
        'platform_id',
        'cover_image',
        'title',
        'reactions',
        'comments',
        'reading_time_minutes',
        'is_english',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];
}
