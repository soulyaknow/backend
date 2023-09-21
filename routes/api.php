<?php

use App\Http\Controllers\Api\V1\InstructorController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/logout','logout');
});

Route::group(['prefix'=>'v1'],function(){
    Route::apiResource('instructors',InstructorController::class);
});