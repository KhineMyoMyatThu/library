<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::get('mainPage',[UserController::class,'mainPage'])->name('mainPage');

Route::group( ['prefix' => 'user'], function(){
    Route::get('userpage',[UserController::class,'userPage'])->name('userPage');
});
