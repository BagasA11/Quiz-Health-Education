<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

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
        return response()->json([$user, $user->createToken('user_token')->plainTextToken]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'=>'required',
            'password'=>'required',
        ]);
        if($validator->failed()){
            return response()->json($validator->errors(), 401);
        }
        if(!Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            return response()->json(['credential invalid', $request->all()], 401);
        }
        $user = Auth::user();
        
        return response()->json([
            'user'=>$user, 
            'token'=>$user->createToken('user_token')->plainTextToken
        ]);
    }
}
