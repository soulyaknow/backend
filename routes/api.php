<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\EvaluateeController;
use App\Http\Controllers\Api\V1\RatingContoller;
use App\Http\Controllers\Api\V1\QuestionaireContoller;
use App\Http\Resources\UserResource;

Route::group(['prefix'=>'v1','middleware'=>'auth:sanctum'],function(){
    Route::apiResource('evaluatees',EvaluateeController::class);
    Route::apiResource('questionaire',QuestionaireContoller::class);
    Route::post('/rating',[RatingContoller::class,'store'])->withoutMiddleware('auth:sanctum');
    Route::get('/profile/{');
});

Route::prefix('auth')->controller(AuthController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/logout','logout')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    $user = User::with(['departments','roles','userInfo'])->find(auth()->user()->id_number);
    // return new UserResource(auth()->user()->load(['departments','roles']) );
    return new UserResource($user);
});

