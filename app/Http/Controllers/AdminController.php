<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Slider_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    //     public function __construct()
    // {
    //     $this->middleware('admin');
    // }



    function login()
    {
        return view("admin.auth.login");
    }


    function index()
    {
        return view("admin.dashboard");
    }



    public function slider()
    {
        $images = Slider_image::all();
        return view('admin.slider')->with('images', $images);
    }



    function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('admin')->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('admin')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('admin.login')->withErrors([
            'error' => "No matching user found with the provided email and password"
        ]);
    }


    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }


    public function profile_admin() {
        return view("admin.auth.profile");
    }



    public function edit_admin()
    {


        $admin_id = auth()->guard('admin')->user()->id;


        $validated = request()->validate([
            'email' => 'required|email|unique:users,email,' . $admin_id,
        ]);


        // Update the user's email using the User model
        Admin::where('id', $admin_id)->update(['email' => $validated['email']]);

        // Redirect the user back to the home page with a success message
        return redirect()->route('admin.profile')->with('success', 'Email updated successfully!');
    }




    public function edit_admin_password()
    {


        $admin = auth()->guard('admin')->user();

        // Validate the request data
        $validated = request()->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Check if the old password matches the user's current password
        if (!Hash::check($validated['old_password'], $admin->password)) {
            return redirect()->route('admin.profile')->withErrors([
                'error' => "The old password is incorrect"
            ]);
        }

        Admin::where('id', $admin->id)->update(['password' => Hash::make($validated['password'])]);


        // Redirect the user back to the home page with a success message
        return redirect()->route('admin.profile')->with('success', 'Password updated successfully!');
    }
}
