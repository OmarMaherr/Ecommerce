<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    // create a function to load a form to send email
    public function loadForm()
    {
        return view("form");
    }
    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required',
        ]);

        try {
            // send email
            $mailData = [
                'subject' => $request->subject,
                'name' => $request->name,
                'message' => $request->message,
            ];

            if (auth()->check()) {
                ContactEmail::create([
                    'user_id' => auth()->user()->id,
                    'subject' => $request->subject,
                    'name' => $request->name,
                    'email' => $request->email,
                    'message' => $request->message,
                ]);

            } else {

                ContactEmail::create([
                    'subject' => $request->subject,
                    'name' => $request->name,
                    'email' => $request->email,
                    'message' => $request->message,
                ]);
            }


            Mail::to($request->email)->send(new SendEmail($mailData));
            return redirect('contact')->with('success', 'Sent successfully!');
        } catch (\Exception $e) {
            return redirect('contact')->with('error', $e->getMessage());
        }
    }
}
