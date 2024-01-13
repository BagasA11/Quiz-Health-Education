<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $admin = Admin::where('email', $request->email)->first();
        
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return response()->json(['token' => $admin->createToken('admin', ['admin'])->plainTextToken], 200);
    }

    public function logout(Request $request) 
    {
        //mengecek tipe user berdasarkan token
        if (!$request->user()->tokenCan('admin')) {
            return response()->json('forbidden access', 403);
        }
        $request->user()->currentAccessToken()->delete();
        // Kembalikan pesan sebagai respons
        return response()->json(['message' => 'Logged out']);
    }
}
