<?php


namespace App\Http\Middleware;


use App\Entities\Helpers\Access;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleValidator
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $response = $next($request);
        $locale = $request->header('locale');
        if (!$locale) {
            $locale = "pt-BR";
            $response->headers->set('locale', 'pt-BR');
        }
        App::setLocale($locale);
        return $response;
    }
}
