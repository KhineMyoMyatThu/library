<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\SocialLoginController;

require_once __DIR__.'/admin.php';


Route::get('/', [MainPageController::class,'home'])->name('home');

Route::get('/search', [MainPageController::class,'home'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/home',[MainPageController::class,'home'])->name('userHome');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//googl login github login
Route::get('/auth/{provider}/redirect',[SocialLoginController::class,'redirect']);

Route::get('/auth/{provider}/callback',[SocialLoginController::class,'callback']);

require __DIR__.'/auth.php';
