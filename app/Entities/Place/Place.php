<?php


namespace App\Entities\Place;


use App\Entities\Skill\Skill;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = "work_places";

    protected $fillable = [
        'company_name',
        'current_company',
        'joined_at',
        'lefted_at'
    ];

    protected $appends = [
        'worked_time'
    ];

    public function getWorkedTimeAttribute()
    {
        if(isset($this->attributes['current_company'])){
            return 'Current';
        }
        $joined = Carbon::parse($this->attributes['joined_at']);
        $lefted = Carbon::parse($this->attributes['lefted_at']);
        $diff = $lefted->diff($joined);
        $format = $diff->y ? "%y " . ($diff->y === 1 ? "ano" : "anos") : '';
        $format .= $diff->m ? " e %m " . ($diff->m === 1 ? "mes" : "meses") : '';
        return $diff->format($format);
    }

    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'work_places_skills',
            'work_place_id',
            'skill_id'
        );
    }

    public function translation(){
        return $this->hasMany(PlaceI18n::class);
    }
}
