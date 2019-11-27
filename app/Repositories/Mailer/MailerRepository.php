<?php


namespace App\Repositories\Mailer;


use App\Entities\Mailer\Mail;
use App\Mail\ContactMail;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Mail as Mailer;

class MailerRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Mail();
    }

    public function create(array $data)
    {
        $mail =  parent::create($data);
        Mailer::to(env('APP_EMAIL'))->send(new ContactMail($mail->toArray()));

        return $mail;
    }
}
