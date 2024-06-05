<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register()
    {
        return view("auth.register");
    }

    function login()
    {
        return view("auth.login");
    }


    public function store()
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8'
            ]
        );


        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );


        return redirect()->route('home')->with('success', 'Account created Successfully!');
    }


    function authenticate()
    {
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );
        $sessionId = session()->getId();

        if (auth()->attempt($validated)) {

            $userId = auth()->id();

            Cart::where('session_id', $sessionId)->update(['user_id' => $userId, 'session_id' => null]);

            request()->session()->regenerate();

            return redirect()->route('home')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'error' => "No matching user found with the provided email and password"
        ]);
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('home')->with('success', 'logged out successfully');
    }

    public function edit_user()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Validate the request data
        $validated = request()->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);


        // Update the user's email using the User model
        User::where('id', $user->id)->update(['email' => $validated['email']]);

        // Redirect the user back to the home page with a success message
        return redirect()->route('profile')->with('success', 'Email updated successfully!');
    }




    public function edit_user_password()
    {

        // Retrieve the authenticated user
        $user = auth()->user();

        // Validate the request data
        $validated = request()->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Check if the old password matches the user's current password
        if (!Hash::check($validated['old_password'], $user->password)) {
            return redirect()->route('profile')->withErrors([
                'error' => "The old password is incorrect"
            ]);
        }

        User::where('id', $user->id)->update(['password' => Hash::make($validated['password'])]);


        // Redirect the user back to the home page with a success message
        return redirect()->route('profile')->with('success', 'Password updated successfully!');
    }


    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.users');
    }

    public function show($id)
    {

        $user = User::select('banned_until')->findOrFail($id);

        if ($user && $user->banned_until) {
            $bannedUntilDates = Carbon::parse($user->banned_until)->format('Y-m-d');
        } else {
            $bannedUntilDates = null; // Or handle the case where the user does not exist
        }
        return response()->json(['bannedUntilDates' => $bannedUntilDates]);
    }

    public function confirm_ban_user(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'ban_date' => 'required',
        ]);

        $user = User::findOrFail($validatedData['user_id']);

        $user->banned_until = $validatedData['ban_date'];
        $user->save();

        return redirect()->back()->with('success', 'User ' . $user->name . ' Baned Until ' . $validatedData['ban_date']);
    }
}
