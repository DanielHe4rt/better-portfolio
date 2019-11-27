<?php


namespace App\Entities\Skill;


use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "skill_type";

    protected $fillable = [
        'name'
    ];

    protected $appends = [
        'slug'
    ];

    public function getNameAttribute(){
        return __('skills.type.' . $this->attributes['name']);
    }

    public function getSlugAttribute(){
        return $this->attributes['name'];
    }
}
