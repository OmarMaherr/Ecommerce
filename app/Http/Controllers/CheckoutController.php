<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Map;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $map = Map::findOrFail(1);
        $carts = Cart::where('user_id',  auth()->id())->with('product.images')->get();

        return view('checkout.checkout', compact('map' , 'carts'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }


    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
    }
}
