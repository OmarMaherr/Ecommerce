<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SingleProductController extends Controller
{

    public function index($id)
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }


    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $product = Product::with('category', 'specification')->findOrFail($id);

        return view('products.single_product', compact('product'));
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
