<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['message' => 'Account created successfully!', 'user' => $user], 201);
    }

    // Authenticate user and login
    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        // return response()->json(['message' => 'login 2 is working!'], 200);
        if (!$validated) {
            return response()->json(['error' => 'Validation failed'], 422);
        }
        if (Auth::attempt($validated)) {
            $user = Auth::user();
            $token = $user->CreateToken("login_token")->plainTextToken;
            // $sessionId = session()->getId();
            // Cart::where('session_id', $sessionId)->update(['user_id' => $user->id, 'session_id' => null]);

            return response()->json(['message' => 'Logged in successfully!', 'user' => $user, 'token' => $token], 200);
        }

        return response()->json(['error' => 'No matching user found with the provided email and password'], 401);
    }

    // Logout the user/id
    public function logout(Request $request)
    {

        auth()->user()->tokens()->delete();
        
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    // Update the user's email
    public function edit_user(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        User::where('id', $user->id)->update(['email' => $validated['email']]);


        // $user->update(['email' => $validated['email']]);

        return response()->json(['message' => 'Email updated successfully!', 'user' => $user], 200);
    }

    // Update the user's password
    public function edit_user_password(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!Hash::check($validated['old_password'], $user->password)) {
            return response()->json(['error' => 'The old password is incorrect'], 400);
        }

        User::where('id', $user->id)->update(['password' => Hash::make($validated['password'])]);

        // $user->update(['password' => Hash::make($validated['password'])]);

        return response()->json(['message' => 'Password updated successfully!'], 200);
    }
}
