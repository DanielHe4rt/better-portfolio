<?php


namespace App\Http\Controllers\Admin\Mailer;


use App\Entities\Mailer\Mail;
use App\Http\BaseController;
use App\Repositories\Admin\Mailer\MailerRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as Mailer;
use Illuminate\View\View;
use function response;

class MailerController extends BaseController
{
    use ApiResponse;

    public function __construct(Mailer $model, MailerRepository $repository)
    {
        $this->model = $model;
        $this->repository = $repository;
    }

    public function viewMails(): View
    {
        $mails = Mail::orderBy('created_at', 'DESC')->get();
        return view('admin.mailer.all', ['mails' => $mails]);
    }

    public function getMail(Request $request, string $mailId)
    {
        $model = $this->repository->findById($mailId, ['status']);
        return response()->json($model);
    }

    public function putMail(Request $request, string $mailId)
    {
        $request->merge([
            'id' => $mailId
        ]);
        $this->validate($request, [
            'id' => 'required|exists:mails',
            'status_id' => 'required'
        ]);
        $data = $request->all();
        $result = $this->repository->update($mailId, $data);
        return $this->success($result);
    }

    public function deleteMail(Request $request, string $mailId)
    {
        $request->merge([
            'id' => $mailId
        ]);
        $this->validate($request, [
            'id' => 'required|exists:mails'
        ]);

        $this->repository->destroy($mailId);
        return $this->success();
    }
}
