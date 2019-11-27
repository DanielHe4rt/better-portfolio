<?php

namespace App\Http\Middleware;

use App\Entities\Helpers\Access;
use Closure;

class AccessLogger
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ipAddress = $request->getClientIp();
        $userAgent = $request->header('User-Agent');
        $model = Access::where('ip', '=', $ipAddress)
            ->whereDate('created_at', date('Y-m-d'))
            ->first();
        if (!$model) {
            Access::create([
                'user_agent' => $userAgent,
                'ip' => $ipAddress
            ]);
        }
        return $next($request);
    }
}
