<?php

 namespace App\Http\Controllers;

 use Kreait\Firebase\Factory;
 use Kreait\Firebase\Messaging\CloudMessage;
 use Kreait\Firebase\Messaging\Notification;

 class PushNotificationController extends Controller
 {
     public function sendPushNotification()
     {
         $firebase = (new Factory)
             ->withServiceAccount(__DIR__.'/../../config/firebase_credentials.json');

         $messaging = $firebase->createMessaging();

         $message = CloudMessage::fromArray([
             'notification' => [
                 'title' => 'Hello from Firebase!',
                 'body' => 'This is a test notification.'
             ],
             'topic' => 'global'
         ]);



         $deviceToken = 'eYhJbCwnkpM9_byfu1bU9x:APA91bF50PdhcaVYFSXsILq4x1Ap5bKjLn39zKH8rXt7dqa3EOuLm-QnBRrvfpRqNZI-HzdmaYGE1dgVOWm2ACchKAv1NDNHR0f5wk20ydMkTKg7Rp3e_BuNHrRGk28XiyRjQ-IFQbYH';

         $message = CloudMessage::withTarget('token', $deviceToken)
             ->withNotification(Notification::create('omar', 'BodyBodyBodyBodyBodyBodyBody')) // optional
             ->withData(['key' => 'value']) // optional
         ;

//         $message = CloudMessage::fromArray([
//             'token' => $deviceToken,
//             'notification' => [/* Notification data as array */], // optional
//             'data' => [/* data array */], // optional
//         ]);

         $messaging->send($message);

         $messaging->send($message);

         return response()->json(['message' => 'Push notification sent successfully']);
     }
 }

// AIzaSyBBqaAH24GZZFtT-2rk1zZ7ssSpSH2JOtY


// <script type="module">
//   // Import the functions you need from the SDKs you need
//   import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-app.js";
//   import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-analytics.js";
//   // TODO: Add SDKs for Firebase products that you want to use
//   // https://firebase.google.com/docs/web/setup#available-libraries
//
//   // Your web app's Firebase configuration
//   // For Firebase JS SDK v7.20.0 and later, measurementId is optional
//   const firebaseConfig = {
//     apiKey: "AIzaSyBBqaAH24GZZFtT-2rk1zZ7ssSpSH2JOtY",
//     authDomain: "ecommerce-ec2a2.firebaseapp.com",
//     projectId: "ecommerce-ec2a2",
//     storageBucket: "ecommerce-ec2a2.appspot.com",
//     messagingSenderId: "352190467268",
//     appId: "1:352190467268:web:fae275e1e0ca205b788d91",
//     measurementId: "G-L6C62BKHCZ"
//   };
//
//   // Initialize Firebase
//   const app = initializeApp(firebaseConfig);
//   const analytics = getAnalytics(app);
// </script>
