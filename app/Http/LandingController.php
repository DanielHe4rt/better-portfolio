<?php

namespace App\Http;

use App\Entities\Helpers\Profile;
use App\Http\Controllers\Controller;
use App\Repositories\LandingRepository;

class LandingController extends Controller
{

    private $repository;

    public function __construct(LandingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function viewPortfolio()
    {
        $result = $this->repository->build();
        return view('portfolio', ['profile' => $result]);
    }
}
