<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\EmailVerify;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Throw_;
use SessionIdInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    public function list()
    {
        return User::all();
    }
    
}
