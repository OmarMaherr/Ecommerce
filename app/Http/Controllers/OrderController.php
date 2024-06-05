<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_number' => 'required|min:9|max:14',
            'email' => 'required|email',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'discount_id' => 'nullable|integer',
        ]);


        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        $totalPrice = 0;
        
        $discount_id = null;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->quantity * $cartItem->product->price;
        }

        if (!is_null($validatedData['discount_id'])) {
            $discount = Discount::findOrFail($validatedData['discount_id']);
            if ($discount) {
                $discount_id = $validatedData['discount_id'];
                $totalPrice -= ($totalPrice * $discount->discount_percentage) / 100;
            }
        }


        $order = Order::create([
            'discount_id' => $discount_id,
            'user_id' => auth()->id(),
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone_number' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
            'country' => $validatedData['country'],
            'city' => $validatedData['city'],
            'latitude' => $validatedData['latitude'],
            'longitude' => $validatedData['longitude'],
            'total_price' => $totalPrice, 
        ]);


        foreach ($cartItems as $cartItem) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_price' => $cartItem->product->price,
                'quantity' => $cartItem->quantity,
            ]);
        }

        // remove the cart items after the order is placed
        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('home')->with('success', 'Color updated successfully.');

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
