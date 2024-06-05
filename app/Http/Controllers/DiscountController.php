<?php

namespace App\Http\Controllers;

use App\DataTables\DiscountDataTable;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(DiscountDataTable $dataTable)
    {
        return $dataTable->render('admin.discounts.discount');
    }


    public function create()
    {
        return view('admin.discounts.add_discount');
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount_code' => 'required',
            'discount_percentage' => 'required|integer|between:1,100',
            'expiry_date' => 'required',
        ]);

        Discount::create([
            'discount_code' => $request->discount_code,
            'discount_percentage' => $request->discount_percentage,
            'expiry_date' => $request->expiry_date,

        ]);

        return redirect()->route('discount.index')->with('success', 'Discount Code created successfully.');
    }


    public function show($id)
    {
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);

        return view('admin.discounts.edit', compact('discount'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'discount_code' => 'required',
            'discount_percentage' => 'required|integer|between:1,100',
            'expiry_date' => 'required',
        ]);


        $discount = Discount::findOrFail($id);

        $discount->update([
            'discount_code' => $request->discount_code,
            'discount_percentage' => $request->discount_percentage,
            'expiry_date' => $request->expiry_date,
        ]);

        return redirect()->route('discount.index')->with('success', 'Discount updated successfully.');
    }


    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();
        return 1;
    }

    public function discount_apply(Request $request)
    {
        // Retrieve coupon code from the request
        $couponCode = $request->input('coupon');

        $discount = Discount::where('discount_code', $couponCode)
            ->first();

        if ($discount) {
            if ($discount->expiry_date < date('Y-m-d')) {
                return response()->json(['message' => 'Expired Coupon']);
            } else {
                return response()->json([
                    'message' => 'Coupon Applied Successfully',
                    'discount_percentage' => $discount->discount_percentage,
                    'discount_id' => $discount->id,
                ]);
            }
        } else {
            return response()->json(['message' => 'Wrong Coupon']);
        }
    }
}
