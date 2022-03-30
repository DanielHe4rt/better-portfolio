<?php


namespace App\Http\Controllers\Admin\Mailer;


use App\Entities\Mailer\Mail;
use App\Http\BaseController;
use App\Http\Requests\Mailer\ReadMailRequest;
use App\Repositories\Admin\Mailer\MailerRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as Mailer;
use Illuminate\View\View;

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
        $mails = $this->repository->build();
        return view('admin.mailer.all', ['mails' => $mails]);
    }

    public function getMail(string $mailId): JsonResponse
    {
        $model = $this->repository->findById($mailId, ['status']);
        return response()->json($model);
    }

    public function putMail(ReadMailRequest $request, string $mailId): JsonResponse
    {
        $result = $this->repository->update($mailId, $request->validated());
        return $this->success($result);
    }

    public function deleteMail(string $mailId): JsonResponse
    {
        $this->repository->destroy($mailId);
        return $this->success();
    }
}
