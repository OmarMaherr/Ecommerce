<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategorySlider;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Slider_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SingleCategoryController extends Controller
{
    public function show($id)
    {
        $id = Crypt::decrypt($id);

        $images = CategorySlider::Where('category_id', $id)->get();

        $categoryIds = Category::where('parent_id', $id)->pluck('id')->toArray();
        array_push($categoryIds, $id);


        $products = Product::with(['category', 'images'])
            ->whereIn('category_id', $categoryIds)
            ->get();



        $category = Category::where('id', $id)->first();

        return view('categories.category', compact('products' , 'category' , 'images'));
    }




}
