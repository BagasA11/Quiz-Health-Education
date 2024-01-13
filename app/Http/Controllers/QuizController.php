<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    function index()
    {
        return response()->json(Quiz::all());
    }
    public function create(Request $request)
    {
        if(!$this->checkUser($request)){
            return response()->json('forbidden access', 403);
        }
        $request->validate([
            'title'=>'required',
            'isfree'=>'required|boolean',
            'img'=>'string|nullable',
            'disc'=>'nullable'
        ]);
        if($request->isfree === true)
        {
            $request['price'] = null;
            $request['disc'] = null;
        } else{
            $request->validate(['price'=>'required']);
        }
        $request['created_at'] = $request->date('d-m-Y');
        Quiz::create($request->all());
        return response()->json(['status' => 'success']);
    }
    /**
     * @param  Request $request
     *  check user type by token given in header authorization
     * @return bool
     */
    protected function checkUser(Request $request):bool
    {   
        // Cek tipe model berdasarkan kemampuan token
        if (!$request->user()->tokenCan('admin')) {
            return false;
        }
        return true;
    }
}
