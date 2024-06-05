<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
class SendNotificationController extends Controller
{
    public function savePushNotificationToken(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $user->update([
            'device_token' => $request->token,
        ]);
        return response()->json(['token saved successfully.']);
    }

    public function sendPushNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AIzaSyBBqaAH24GZZFtT-2rk1zZ7ssSpSH2JOtY';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

    }
}
