<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register
    public function register(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()],422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('Mi_Laravel_Auth')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    // Login
    public function login(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()],422);
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                $data = [
                    'email' => $request->email,
                    'password' => $request->password
                ];

                if (auth()->attempt($data)) {
                    $token = $user->createToken('Mi_Laravel_Auth')->accessToken;
                    return response()->json(['token' => $token], 200);
                } else {
                    return response()->json(['error' => 'Unauthorised'], 401);
                }
            } else {
                return response()->json(['error' => 'Password missmatch'], 422);
            }
        } else {
            return response()->json(['error' => 'User does not exist'], 422);
        }
    }

    // Logout
    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();

        return response()->json(['You have been succesfully logged out!'], 200);
    }
}
