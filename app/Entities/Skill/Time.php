<?php


namespace App\Entities\Skill;


use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = "skill_time";

    protected $fillable = ['name'];

    public function getNameAttribute(){
        return __('skills.time.' . $this->attributes['name']);
    }
}
