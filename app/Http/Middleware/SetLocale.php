<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $acceptLangguage = $request->server->get('HTTP_ACCEPT_LANGUAGE'); // Header의 Accept_language 취득
        $lang = session('locale') ?? substr(locale_accept_from_http($acceptLangguage), 0, 2); // Accept_language의 언어들중에서 최우선 순위의 언어 locale취득

        if (in_array($lang, ['en', 'ko', 'ja'])) {
            session()->put('locale', $lang);
            App::setLocale($lang);
        }

        return $next($request);
    }
}
