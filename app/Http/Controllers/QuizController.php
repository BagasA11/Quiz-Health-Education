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
        if(!$request->user()->tokenCan('admin')){
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
}
