<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\DashboardRepository;
use Illuminate\View\View;

class DashboardController extends Controller
{
    private DashboardRepository $repository;

    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function viewDashboard(): View
    {
        $statistics = $this->repository->build();
        return view('admin.dashboard', ['statistics' => json_encode($statistics)]);
    }
}
