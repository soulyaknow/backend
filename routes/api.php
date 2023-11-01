<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\RatingContoller;
use App\Http\Controllers\Api\V1\EvaluateeController;
use App\Http\Controllers\Api\v1\DepartmentController;
use App\Http\Controllers\Api\V1\QuestionaireContoller;

Route::group(['prefix'=>'v1','middleware'=>'auth:sanctum'],function(){
    Route::apiResource('evaluatees',EvaluateeController::class);
    Route::apiResource('questionaire',QuestionaireContoller::class);
    Route::post('/rating',[RatingContoller::class,'store'])->withoutMiddleware('auth:sanctum');
    Route::apiResource('departments',DepartmentController::class)->only(['index']);
    Route::post('/evaluated',[EvaluateeController::class,'evaluated']);
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

