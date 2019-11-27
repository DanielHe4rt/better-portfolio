<?php


namespace App\Repositories\View;


use App\Entities\Helpers\Access;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ViewRepository
{
    public function getAccessData(): array
    {
        $between = [
            Carbon::now()->subDays(30)->format('Y-m-d'),
            Carbon::now()->format('Y-m-d')
        ];
        $data = Access::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as access'))
            ->groupBy('date')
            ->limit(30)
            //->whereBetween(DB::raw('DATE(created_at)'), $between)
            ->orderBy('date','asc')
            ->get();

        return $data->toArray();
    }
}
