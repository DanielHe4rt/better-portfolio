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
        'role',
        'description',
        'joined_at',
        'lefted_at'
    ];

    protected $casts = [
        'joined_at' => 'datetime:Y-m-d',
        'lefted_at' => 'datetime:Y-m-d',
    ];

    protected $appends = [
        'worked_time'
    ];

    public function getWorkedTimeAttribute()
    {
        $joined = Carbon::parse($this->attributes['joined_at']);
        $leftedFlag = !empty($this->attributes['lefted_at']) ? true : false;
        $lefted = Carbon::parse($this->attributes['lefted_at']);
        $diff = $lefted->diff($joined);
        $format = $diff->y ? "%y " . ($diff->y === 1 ? "year" : "years") : '';
        $format .= $diff->y && $diff->m ? " e " : '';
        $format .= ($diff->m ? " %m " . ($diff->m === 1 ? "month" : "months") : '');
        $format .= !$leftedFlag ? ' until now' : '';

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
}
