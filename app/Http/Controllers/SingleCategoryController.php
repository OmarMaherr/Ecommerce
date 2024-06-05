<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SingleCategoryController extends Controller
{
    public function show($id)
    {
        $id = Crypt::decrypt($id);

        $categoryIds = Category::where('parent_id', $id)->pluck('id')->toArray();
        array_push($categoryIds, $id);


        $products = Product::with(['category', 'specification'])
            ->whereIn('category_id', $categoryIds)
            ->get();

        $category = Category::where('id', $id)->first();

        return view('categories.category', compact('products' , 'category'));
    }

}
