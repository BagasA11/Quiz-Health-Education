<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/halo', function () {
    return response()->json(['pesan' => 'halo']);
});
Route::post('/register', [RegisterController::class, 'userregister']);
Route::middleware('auth:api')->get('/admin', [AdminController::class, 'index']);
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');
