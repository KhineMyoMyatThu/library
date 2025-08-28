<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use GuzzleHttp\Middleware;



Route::group(['prefix' =>'user', 'middleware' => 'user'], function(){
    Route::get('home', [UserController::class,'userPage'])->name('userPage');
});


