<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function rank()
    {
        return response()->json(Score::with('user')->get());   
    }
}
