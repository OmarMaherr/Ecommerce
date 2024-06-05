<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class CurrencyController extends Controller
{

    public function convertCurrency($to)
    {
        session()->put('current_currency', $to);
        return back();
    }
}


