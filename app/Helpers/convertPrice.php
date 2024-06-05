<?php
function  cartCount()
{
    if(auth()->user()) {
        $cartCount = \App\Models\Cart::where('user_id', auth()->user()->id)->count();
    } else {
        $cartCount = \App\Models\Cart::where('session_id', session()->getId())->count();
    }
    return $cartCount;
}


function convertPrice($price){
    $currencyRates = \Illuminate\Support\Facades\Cache::get('currency_rate');
    $currentCurrency = session('current_currency');
    $currentRate = $currencyRates[$currentCurrency] ?? null;

    return $price * $currentRate;
}
?>
