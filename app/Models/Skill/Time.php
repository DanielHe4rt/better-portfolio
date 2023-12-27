<?php

namespace App\Models\Skill;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'skill_time';

    protected $fillable = ['name'];

    public function getNameAttribute(): string
    {
        return __('skills.time.'.$this->attributes['name']);
    }
}
