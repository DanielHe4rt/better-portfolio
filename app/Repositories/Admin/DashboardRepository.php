<?php

namespace App\Repositories\Admin;

use App\Entities\Helpers\Access;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardRepository
{
    public function build()
    {
        return Access::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as access'))
            ->groupBy('date')
            ->limit(30)
            ->whereBetween(DB::raw('DATE(created_at)'), [
                Carbon::now()->subDays(30)->format('Y-m-d'),
                Carbon::now()->format('Y-m-d')
            ])
            ->orderBy('date', 'desc')
            ->get()
            ->toArray();
    }
}
