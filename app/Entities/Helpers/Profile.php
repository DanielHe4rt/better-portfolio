<?php


namespace App\Entities\Helpers;


use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profile";

    protected $fillable = [
        'name','value','description','enabled'
    ];

    protected $appends = [
        'slug'
    ];

    protected $casts = [
        'enabled' => 'boolean'
    ];

    public function getNameAttribute(){
        return __('profile.' . $this->attributes['name']);
    }

    public function getSlugAttribute(){
        return $this->attributes['name'];
    }
}
