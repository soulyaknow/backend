<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\V1\RatingContoller;
use App\Http\Controllers\Api\V1\EvaluateeController;
use App\Http\Controllers\Api\v1\DepartmentController;
use App\Http\Controllers\Api\V1\QuestionaireContoller;

Route::group(['prefix'=>'v1','middleware'=>'auth:sanctum'],function(){

    Route::apiResource('questionaire',QuestionaireContoller::class)->only(['index']);
    Route::get('/questionaire/latest',[QuestionaireContoller::class,'latestQuestionaire']);

    Route::post('/evaluated',[EvaluateeController::class,'evaluated']);
    Route::apiResource('evaluatees',EvaluateeController::class);

    // Route::post('/evaluated',[EvaluateeController::class,'evaluated']);


    Route::post('/rating',[RatingContoller::class,'store'])->withoutMiddleware('auth:sanctum');


    Route::apiResource('departments',DepartmentController::class)->only(['index'])->withoutMiddleware('auth:sanctum');


    Route::apiResource('roles',RoleController::class)->only(['index'])->withoutMiddleware('auth:sanctum');



    Route::apiResource('users',UserController::class)->only(['index']);
    Route::get('/user',[UserController::class,'getUser']);

});

Route::prefix('auth')->controller(AuthController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/logout','logout')->middleware('auth:sanctum');
});


Route::get('/test',[TestController::class,'testModel']);
