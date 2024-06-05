<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Slider_image;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\AndroidConfig;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Messaging\Notification as FirebaseNotification;
use Kreait\Laravel\Firebase\Facades\Firebase;

class HomeController extends Controller
{

    public function index()
    {

        $deviceToken = 'e2yZ2ClAKLERC8J6_E4O8A:APA91bGFA0s_IilH2nx82ob8iv8QCJCxnoJWK1RgMObdM7HbnGwWsl9j1in-hLSEQDrz_J_8nDRfztZ4LrJf38h_61_pHAHDgE1kMnmxEbRR_H3CMQ1DwdTPUXMGG5uxNYDZs8Y8NAs6';

        $messaging = Firebase::messaging();
        $message = CloudMessage::withTarget('token', $deviceToken)
        ->withNotification(FirebaseNotification::create('Title', 'Body'));
//        $messaging->send($message);




        $images = Slider_image::all();
        $products = Product::latest()->take(5)->with('images')->get();
        $inspired_products = Product::inRandomOrder()->take(8)->with('images')->get();
        $feature_product = Product::where('is_featured', 1)->with('images')->get();

        return view('home', compact('images', 'products', 'inspired_products', 'feature_product'));
    }

    public function profile()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view("user_pages.profile", compact("orders"));
    }
}
