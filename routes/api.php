<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CommentController;

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

Route::get('/comment',[CommentController::class,"index"]);
Route::post('/comment',[CommentController::class,"store"]);
Route::get('/comment/{comment:uuid}',[CommentController::class,"show"]);