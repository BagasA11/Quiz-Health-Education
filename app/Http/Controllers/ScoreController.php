<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function rank()
    {
        $score = Score::with('user:id,username')->orderBy('score', 'desc')->get();
        return response()->json(
            $score
        );
    }
    public function calculate(Request $request)
    {
        
    }
}
