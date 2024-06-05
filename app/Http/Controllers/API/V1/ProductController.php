<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function single_product(Request $request) {
        
        $id = $request->id;
        $product = Product::with('category')->with('images')->findOrFail($id);
        return response()->json(['message' => 'Data successfully!', 'product' => $product], 200);

    }
}
