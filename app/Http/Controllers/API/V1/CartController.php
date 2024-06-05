<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $userId = auth()->user()->id;
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $validatedData['product_id'])
            ->first();

        $totalQuantity = $validatedData['quantity'] ?? 1;
        if ($cart) {
            $totalQuantity += $cart->quantity;
        }

        if ($cart) {
            $cart->update(['quantity' => $totalQuantity]);
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $validatedData['product_id'],
                'quantity' => $totalQuantity,
            ]);
        }
        return response()->json(['message' => 'Product added to cart successfully!'], 200);
    }

    public function guest_add_to_cart(Request $request)
    {

        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);


        $userId = $request->device_id;
        $cart = Cart::where('session_id', $userId)
            ->where('product_id', $validatedData['product_id'])
            ->first();


        $totalQuantity = $validatedData['quantity'] ?? 1;
        if ($cart) {
            $totalQuantity += $cart->quantity;
        }

        if ($cart) {
            $cart->update(['quantity' => $totalQuantity]);
        } else {
            Cart::create([
                'session_id' => $userId,
                'product_id' => $validatedData['product_id'],
                'quantity' => $totalQuantity,
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully!'], 200);
    }

    public function get_cart()
    {
        $userId = auth()->user()->id;
        $productsInCart = Cart::where('user_id', $userId)
            ->with('product.images')
            ->get();

        return response()->json(['message' => 'Cart successfully!', "productsInCart" => $productsInCart], 200);
    }

    public function guest_get_cart(Request $request)
    {
        $userId = $request->device_id;
        $productsInCart = Cart::where('session_id', $userId)
            ->with('product.images')
            ->get();

        return response()->json(['message' => 'Cart successfully!', "productsInCart" => $productsInCart], 200);
    }

    public function remove_from_cart(Request $request)
    {
        $cartId = $request->cart_id;
        $cart = Cart::find($cartId);
        if ($cart) {
            $cart->delete();
            return response()->json(['message' => 'Cart item Deleted successfully!'], 200);
        } else {
            return response()->json(['message' => 'Cart item not found.'], 400);
        }
    }
}
