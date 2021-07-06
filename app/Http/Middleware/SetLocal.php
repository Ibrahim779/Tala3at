<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocal
{
    const LANG_KEY = 'lang';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session(self::LANG_KEY)) {
            App::setLocale(session(self::LANG_KEY));
            if (session(self::LANG_KEY) == 'ar')
                session(['dir' => 'rtl']);
            else
                session(['dir' => 'ltr']);
        }else {
            if (App::getLocale() == 'ar')
                session(['dir' => 'rtl']);
            else
                session(['dir' => 'ltr']);
        }
        return $next($request);
    }
}
