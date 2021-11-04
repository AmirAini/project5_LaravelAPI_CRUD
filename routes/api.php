<?php

use App\Http\Controllers\Table\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//!Insert Data
Route::post('/student',[StudentController::class,'create'])->name('student.create');

//!Display Data
Route::get('/student/get',[StudentController::class, 'index']);
Route::get('/student/get/{id}',[StudentController::class, 'display']);
Route::post('/student/update/{id}',[StudentController::class, 'update']);

//!Destroy Data
Route::post('/student/delete/{id}',[StudentController::class,'delete']);