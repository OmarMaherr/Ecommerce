<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Slider_image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Factory;

class HomeController extends Controller
{

    public function index()
    {



        $images = Cache::remember('Slider_image', 172800, function() {
            return Slider_image::all();
        });
        $products = Cache::remember('NewProduct', 172800, function() {
            return Product::latest()->take(5)->with('images')->get();
        });
        $inspired_products = Cache::remember('inspired_products', 172800, function() {
            return  Product::inRandomOrder()->take(8)->with('images')->get();
        });
        $feature_product = Cache::remember('feature_product', 172800, function() {
            return Product::where('is_featured', 1)->with('images')->get();
        });





        return view('home', compact('images', 'products', 'inspired_products', 'feature_product'));
    }

    public function profile()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view("user_pages.profile", compact("orders"));
    }
}
