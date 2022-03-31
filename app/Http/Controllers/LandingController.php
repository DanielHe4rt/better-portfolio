<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mailer\CreateMailRequest;
use App\Repositories\Admin\Mailer\MailerRepository;
use App\Repositories\LandingRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use function view;

class LandingController extends Controller
{
    use ApiResponse;

    private LandingRepository $landingRepository;

    private MailerRepository $mailerRepository;

    public function __construct(LandingRepository $landingRepository, MailerRepository $mailerRepository)
    {
        $this->landingRepository = $landingRepository;
        $this->mailerRepository = $mailerRepository;
    }

    public function viewPortfolio()
    {
        $result = $this->landingRepository->build();
        return view('portfolio', $result);
    }

    public function postMail(CreateMailRequest $request): JsonResponse
    {
        $this->mailerRepository->create($request->validated());
        return $this->success();
    }
}
