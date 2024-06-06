<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification as FirebaseNotification;
use Kreait\Laravel\Firebase\Facades\Firebase;

class SendNotificationController extends Controller
{
    public function index()
    {
        return view("admin.SendNotifications.SendNotification");
    }
    public function store(Request $request)
    {
//        return view("admin.SendNotifications.SendNotification");
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

//        Brand::create([
//            'name' => $request->name,
//        ]);
//        $deviceToken = ['e2yZ2ClAKLERC8J6_E4O8A:APA91bGFA0s_IilH2nx82ob8iv8QCJCxnoJWK1RgMObdM7HbnGwWsl9j1in-hLSEQDrz_J_8nDRfztZ4LrJf38h_61_pHAHDgE1kMnmxEbRR_H3CMQ1DwdTPUXMGG5uxNYDZs8Y8NAs6'];

//        $deviceToken = 'e2yZ2ClAKLERC8J6_E4O8A:APA91bGFA0s_IilH2nx82ob8iv8QCJCxnoJWK1RgMObdM7HbnGwWsl9j1in-hLSEQDrz_J_8nDRfztZ4LrJf38h_61_pHAHDgE1kMnmxEbRR_H3CMQ1DwdTPUXMGG5uxNYDZs8Y8NAs6';
//
//        $messaging = Firebase::messaging();
//        $message = CloudMessage::withTarget('token', $deviceToken)
//            ->withNotification(FirebaseNotification::create($request->title, $request->body));
//        $messaging->send($message);

        $deviceTokens = User::whereNotNull('device_token')->pluck('device_token')->toArray();

        $messaging = Firebase::messaging();
        $message = CloudMessage::new(); // Any instance of Kreait\Messaging\Message
        $message = $message->withNotification(FirebaseNotification::create($request->title, $request->body));
         $messaging->sendMulticast($message, $deviceTokens);



        return redirect()->back()->with('success', 'Brand created successfully.');

    }
    public function savePushNotificationToken(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $user->update([
            'device_token' => $request->token,
        ]);
        return response()->json(['token saved successfully.']);
    }


}
