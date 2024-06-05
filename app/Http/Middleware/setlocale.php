<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\URL;
class setlocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
//        app()->setLocale($request->segment(1));
//        URL::defaults(['locale' => $request->segment(1)]);

//        if(session()->missing('lang')) {
//            session()->put('lang', 'ar');
//        }
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        } else {
            App::setLocale("ar");
        }
        return $next($request);
    }
}
