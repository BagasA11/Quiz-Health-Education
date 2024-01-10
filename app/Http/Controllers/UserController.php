<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\EmailVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Throw_;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function register(Request $req){
        $req->validate([
            'email' => 'required|unique:users|email',
            'username' => 'required|unique:users|max:100',
            'password'=>'required|max:30'
        ]);
        // var_dump($req->all());
        User::create([
            'email'=>$req->email,
            'username'=>$req->username,
            'password'=>Hash::make($req->password)
        ]); 
        return response()->json(['username'=>$req->username]);
    }

}
