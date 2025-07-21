<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

require_once __DIR__.'/admin.php';
require_once __DIR__.'/user.php';

Route::get('home', [MainPageController::class,'guestPage'])->name('guest');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//googl login github login
Route::get('/auth/{provider}/redirect',[SocialLoginController::class,'redirect']);

Route::get('/auth/{provider}/callback',[SocialLoginController::class,'callback']);

require __DIR__.'/auth.php';
