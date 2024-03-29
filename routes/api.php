<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->get('/quiz', [QuizController::class, 'index']);
Route::middleware('auth:sanctum')->get('/score/rank', [ScoreController::class, 'rank']);
Route::middleware('auth:sanctum,admin')->post('/quiz/create', [QuizController::class, 'create']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::middleware('auth:sanctum,admin')->get('/admin/logout', [AdminController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user/logout', [UserController::class, 'logout']);
Route::middleware('auth:sanctum,admin')->post('/quiz/{id}/create', [QuestionController::class, 'create']);
Route::middleware('auth:sanctum')->post('/user/detail', [UserController::class, 'getUser']);
// Route::get('/score/leaderboard', [ScoreController::class, 'all']);
