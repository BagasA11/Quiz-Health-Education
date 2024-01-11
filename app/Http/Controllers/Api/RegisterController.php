<?php 
namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BasicController;
use Illuminate\Support\Facades\Validator;


class RegisterController extends BasicController{
    /**
     * register api 
     * @return \Illuminate\Http\Response
     */
    public function userregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'=>'required|unique:users',
            'email'=>'required|unique:users,email|email',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('input invalid', $validator->errors(), 422);
        }
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());
        $success['token'] = $user->createToken('user token')->accessToken;
        $success['name'] = $user->username;
        return $this->sendResponse($success, 'user register successfuly');
    }
}

?>