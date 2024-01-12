<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    function index()
    {
        return response()->json(Quiz::all());
    }
}
