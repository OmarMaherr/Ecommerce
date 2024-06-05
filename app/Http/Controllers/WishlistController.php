<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id',  auth()->id())->with('product.images')->get();

        return view('wishlists.wishlist', compact('wishlists'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Determine the user ID or session ID
        $userId = Auth::id();
        Wishlist::create([
            'user_id' => $userId,
            'product_id' => $validatedData['product_id'],
        ]);

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Product added to cart successfully.');
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
        $wishlist = Wishlist::findOrFail($id);
        if (!$wishlist) {
            return redirect()->back()->withErrors('error', 'Wishlist item not found.');
        }
        $wishlist->delete();
        return redirect()->back()->with('success', 'Item removed from wishlist successfully.');
    }
}
