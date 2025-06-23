<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Create a new token for the user
        $token = $user->createToken('api')->plainTextToken;

        return response()->json([compact('user', 'token')]);
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Check if the user exists and verify the password
        $user = User::where('email', $request->email)->first();
        if (!$user || !password_verify($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Create a new token for the user
        $token = $user->createToken('api')->plainTextToken;
        
        return response()->json(compact('user', 'token'));
    }

    /**
     * Get the authenticated user.
     */
    public function me(Request $request)
    {
        // Return authenticated user details
        return response()->json($request->user());
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        // Revoke the user's token
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}