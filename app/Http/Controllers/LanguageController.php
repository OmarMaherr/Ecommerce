<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request, Closure $next)
    {
//        app()->setLocale($locale);
//
//        dd(app()->getLocale());
//        return redirect()->back();


        app()->setLocale($request->segment(1));
        URL::defaults(['locale' => $request->segment(1)]);
        return $next($request);
    }
}
