<?php

namespace App\Http\Middleware;

class LocaleValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $locale = $request->header('locale');
        if ($locale) {
            app()->setLocale('pt-BR');
        }

        return $next($request);
    }
}
