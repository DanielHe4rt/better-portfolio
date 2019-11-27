<?php


namespace App\Entities\Skill;


use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = "skills";
    protected $fillable = [
        'name',
        'type_id',
        'time_id',
        'comment'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function time(){
        return $this->belongsTo(Time::class);
    }


}
