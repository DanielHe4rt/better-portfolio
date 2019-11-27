<?php


namespace App\Http\Controllers\Mailer;


use App\Entities\Mailer\Mail;
use App\Http\BaseController;
use App\Mail\ContactMail;
use App\Repositories\Mailer\MailerRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail as Mailer;
use Ramsey\Uuid\Uuid;

class MailerController extends BaseController
{
    use ApiResponse;

    public function __construct(Mailer $model, MailerRepository $repository)
    {
        $this->model = $model;
        $this->repository = $repository;
    }

    public function postMail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'subject' => 'required',
            'content' => 'required'
        ]);

        $request->merge([
            'id' => Uuid::uuid4()->toString(),
            'ip' => $request->getClientIp(),
            'user_agent' => $request->header('User-Agent')
        ]);

        $data = $request->all();
        $this->repository->create($data);
        return $this->success();
    }

    public function getMail(Request $request, string $mailId){
        $model =  $this->repository->findById($mailId,['status']);
        return response()->json($model);
    }

    public function putMail(Request $request, string $mailId){
        $request->merge([
            'id' => $mailId
        ]);
        $this->validate($request,[
            'id' => 'required|exists:mails',
            'status_id' => 'required'
        ]);
        $data = $request->all();
        $result = $this->repository->update($mailId,$data);
        return $this->success($result);
    }

    public function deleteMail(Request $request, string $mailId){
        $request->merge([
            'id' => $mailId
        ]);
        $this->validate($request,[
            'id' => 'required|exists:mails'
        ]);

        $this->repository->destroy($mailId);
        return $this->success();
    }
}
