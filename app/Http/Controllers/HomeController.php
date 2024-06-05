<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Slider_image;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Messaging\Notification as FirebaseNotification;
class HomeController extends Controller
{

    public function index()
    {

//        $deviceToken = 'eYhJbCwnkpM9_byfu1bU9x:APA91bF50PdhcaVYFSXsILq4x1Ap5bKjLn39zKH8rXt7dqa3EOuLm-QnBRrvfpRqNZI-HzdmaYGE1dgVOWm2ACchKAv1NDNHR0f5wk20ydMkTKg7Rp3e_BuNHrRGk28XiyRjQ-IFQbYH';
//        $firebase = (new Factory)
//            ->withServiceAccount(__DIR__.'../../../../config/firebase_credentials.json');
//
//        $messaging = $firebase->createMessaging();
//        $message = CloudMessage::withTarget('token', $deviceToken)
//        ->withNotification(FirebaseNotification::create('Title', 'Body'));
//
//        $messaging->send($message);
//        return response()->json(['message' => 'Push notification sent successfully']);


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
