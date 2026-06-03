<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\User\UserController;


Route::group(['prefix'=> 'user', 'middleware' => 'auth'
],function(){
    Route::group(['prefix'=> 'profile'], function(){
        Route::get('account',[UserController::class,'account'])->name('user#account');
        Route::get('editProfile',[UserController::class,'editProfile'])->name('user#editProfile');
        Route::post('updateProfile',[UserController::class,'updateProfile'])->name('user#updateProfile');
    });

    Route::group(['prefix' => 'password'],function(){
        Route::get('change',[UserController::class,'change'])->name('password#change');
        Route::post('update',[UserController::class,'update'])->name('password#update');
    });

    Route::prefix('api')->group(function(){
        Route::get('/book/{id}/rating',[UserController::class,'getBookRating'])->name('user#book.rate');
        Route::post('/book/{id}/rate',[UserController::class,'rateBook'])->name('user#rateBook');
        Route::post('/book/{id}/save',[SaveController::class,'store'])->name('user#book.save');
    });

 });

