<?php


namespace App\Entities\Helpers;


use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = "device_access";

    protected $fillable = ['user_agent','ip'];
}
