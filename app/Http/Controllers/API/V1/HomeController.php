<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider_image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $images = Slider_image::all();

        $products = Product::with('images')->latest()->take(5)->get();

        $inspired_products = Product::with('images')->inRandomOrder()->take(8)->get();


        return response()->json(['message' => 'Data successfully!', 'slider_images' => $images , 'prodcuts' => $products , 'inspired_products' => $inspired_products], 200);

    }
}
