<?php


namespace App\Entities\Place;


use Illuminate\Database\Eloquent\Model;

class PlaceI18n extends Model
{
    protected $table = "work_places_i18n";
    protected $fillable = [
        'place_id',
        'role',
        'description',
    ];

    public function place(){
        return $this->belongsTo(Place::class);
    }
}
