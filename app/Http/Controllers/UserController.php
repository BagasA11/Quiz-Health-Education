<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'username'=>'required|unique:users',
            'email'=>'email|unique:users|required',
            'password'=>'required',
            'c_pass'=>'required|same:password'
        ]);
        if($validator->failed()){
            return response()->json($validator->errors(), 401);
        }
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->except('c_pass'));
        return response()->json([$user, $user->createToken('user_token', ['user'])->plainTextToken]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        // Cari pengguna berdasarkan email
        $user = User::where('username', $request->username)->first();   
        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
         // Kembalikan token sebagai respons
        return response()->json([
            'token' => 
            $user->createToken('user token', ['user'])
            ->plainTextToken
        ]);
    }

    public function logout(Request $request) 
    {
        //mengecek tipe user berdasarkan token
        if (!$request->user()->tokenCan('user')) {
            return response()->json('forbidden access', 403);
        }
        // Hapus token saat ini
        $request->user()->currentAccessToken()->delete();
        // Kembalikan pesan sebagai respons
        return response()->json(['message' => 'Logged out']);
    }

}
