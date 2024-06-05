<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('current_currency')) {
            // Default currency or logic to determine default currency
            $defaultCurrency = 'JOD'; 
            Session::put('current_currency', $defaultCurrency);
        }

        return $next($request);
    }
}
