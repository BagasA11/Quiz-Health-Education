<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    public function create(Request $request, $id)
    {
        if(!$request->user()->tokenCan('admin'))
        {
            return response()->json('forbidden access', 403);
        }
        $request->validate([
            'question'=>'required',
            'answer'=> 'required'
        ]);

        if (!in_array($request['answer'], ['A', 'B', 'C', 'D'])) {
            return response()->json(['massage'=>['answer field must be in given option',
                'opt'=>['A', 'B', 'C', 'D']
            ]], 422);
        }

        $request['quiz_id'] = $id;
        Question::create([
            'question' => $request->question,
            'answer'=>$request->answer,
            'quiz_id'=>$request->quiz_id
        ]);
        return response()->json(['massage'=>'question was created']);
    }

}
