<?php


namespace App\Entities\Mailer;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use SoftDeletes;
    public $incrementing = false;
    protected $table = "mails";

    protected $fillable = [
        'id',
        'email',
        'name',
        'subject',
        'content',
        'status_id',
        'ip',
        'user_agent'
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }

}
