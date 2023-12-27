<?php

namespace App\Http\Controllers;

use App\Repositories\LandingRepository;

class LandingController extends Controller
{
    public function __construct(private LandingRepository $landingRepository)
    {
        $this->landingRepository = $landingRepository;
    }

    public function viewPortfolio()
    {
        $result = $this->landingRepository->build();

        return view('portfolio', $result);
    }
}
