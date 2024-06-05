<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{

    // public function handle(Request $request, Closure $next)
    // {
    //     if (!Auth::guard('admin')->check()) {
    //         return redirect()->route('admin.login');
    //     }

    //     // return $next($request);
    //     return redirect()->route('admin.login')->withErrors('You do not have permission to access this page.');
    // }


    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }

    // public function handle(Request $request, Closure $next)
    // {
    //     // Check if the authenticated user is an admin
    //     if (auth()->check() && auth()->user()->is_admin == 1) {
    //         return $next($request);
    //     }

    //     // If the user is not an admin, redirect or return an error response
    //     return redirect()->route('admin.login')->withErrors('You do not have permission to access this page.');
    // }
}
