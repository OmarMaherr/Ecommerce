<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function apply_coupon(Request $request)
    {
        // Retrieve coupon code from the request
        $couponCode = $request->coupon;

        $discount = Discount::where('discount_code', $couponCode)
            ->first();

        if ($discount) {
            if ($discount->expiry_date < date('Y-m-d')) {
                return response()->json(['message' => 'Expired Coupon'], 400);
            } else {

                return response()->json([
                    'message' => 'Coupon Applied Successfully',
                    'discount_percentage' => $discount->discount_percentage, 'discount_id' => $discount->id
                ], 200);
            }
        } else {
            return response()->json(['message' => 'Wrong Coupon'], 400);
        }
    }




    public function new_order(Request $request)
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
            'coupon_code' => 'nullable',
        ]);


        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        $totalPrice = 0;

        $discount_id = null;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->quantity * $cartItem->product->price;
        }


        if (!is_null($validatedData['coupon_code'])) {
            $discount = Discount::where('discount_code', $validatedData['coupon_code'])
                ->first();
            if ($discount) {
                if ($discount->expiry_date < date('Y-m-d')) {
                } else {
                    $discount_id = $discount->id;
                    $totalPrice -= ($totalPrice * $discount->discount_percentage) / 100;
                }
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
        Cart::where('user_id', auth()->id())->delete();

        return response()->json([
            'message' => 'Order Done Successfully',
        ], 200);
    }
}
