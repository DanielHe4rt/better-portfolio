<?php


namespace App\Repositories\Admin\Mailer;


use App\Entities\Mailer\Mail;
use App\Mail\ContactMail;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Mail as Mailer;
use function portfolio_info;

class MailerRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Mail();
    }

    public function create(array $data)
    {
        $mail =  parent::create($data);
        Mailer::to(
            portfolio_info('email')
        )->send(new ContactMail($mail->toArray()));

        return $mail;
    }
}
