<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\InstructorController;
use App\Http\Controllers\Api\V1\QuestionaireContoller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::group(['prefix'=>'v1','middleware'=>'auth:sanctum'],function(){
    Route::apiResource('instructors',InstructorController::class)->only(['index'])->withoutMiddleware('auth:sanctum');
    Route::apiResource('questionaire',QuestionaireContoller::class)->only(['index'])->withoutMiddleware('auth:sanctum');


});
Route::prefix('auth')->controller(AuthController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/logout','logout')->middleware('auth:sanctum');
});
Route::get('/user', function (Request $request) {
    return $request->user();
});

