<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id',  auth()->id())->with('product.images')->get();
        } else {
            $carts = Cart::where('session_id', session()->getId())->with('product.images')->get();
        }

        return view('carts.cart', compact('carts'));
    }

    public function create()
    {
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();
            $cart = Cart::where('user_id', $userId)
                ->where('product_id', $validatedData['product_id'])
                ->first();
        } else {
            $userId = session()->getId();
            $cart = Cart::where('session_id', $userId)
                ->where('product_id', $validatedData['product_id'])
                ->first();
        }


        $totalQuantity = $validatedData['quantity'] ?? 1;
        if ($cart) {
            $totalQuantity += $cart->quantity;
        }

        if ($cart) {
            $cart->update(['quantity' => $totalQuantity]);
        } else {
            if (Auth::check()) {
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $validatedData['product_id'],
                    'quantity' => $totalQuantity,
                ]);
            } else {
                Cart::create([
                    'session_id' => $userId,
                    'product_id' => $validatedData['product_id'],
                    'quantity' => $totalQuantity,
                ]);
            }
        }

        return redirect()->back()->with('add_to_cart', 'Product added to cart successfully.');
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


    public function destroy($cartId)
    {
        // Find the cart item by ID
        $cart = Cart::findOrFail($cartId);
        if (!$cart) {
            return redirect()->back()->withErrors('error', 'Cart item not found.');
        }
        $cart->delete();
        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }
}
