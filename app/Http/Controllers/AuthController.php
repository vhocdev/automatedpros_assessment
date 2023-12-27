<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    
        $token = $user->createToken('automatedpros')->plainTextToken;
    
        return response()->json(['token' => $token, 'user' => $user, 'name' => $user->name, 'email' => $user->email], 201);
    }


    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid Credentials'
            ], 401);
        }

        $token = $user->createToken('automatedpros')->plainTextToken;


        $response = [
            'user'   => $user,
            'token'  => $token
        ];

        return response($response, 201);
    }

    public function logout() {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Disconnected'
        ];
    }
}
