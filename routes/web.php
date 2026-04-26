<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

require_once __DIR__.'/admin.php';
require_once __DIR__.'/user.php';


Route::get('/', [MainPageController::class,'home'])->name('home');


//For search
Route::get('/search', [MainPageController::class,'search'])->name('search');


//For book section
Route::prefix('books')->group(function(){
    Route::get('/',[BookController::class,'index'])->name('books.index');
    Route::get('/{id}',[BookController::class,'detail'])->name('books.detail');
    Route::get('/download/{id}',[BookController::class,'download'])->name('books.download');
});

//For category section
Route::prefix('categories')->group(function(){
    Route::get('/',[CategoryController::class,'index'])->name('categories.index');
});

//For author section
Route::prefix('authors')->group(function(){
    Route::get('/{id}',[AuthorController::class,'detail'])->name('authors.detail');
});

//for category section
Route::prefix('categories')->group(function() {
    Route::get('/{id}',[CategoryController::class,'detail'])->name('categories.detail');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[MainPageController::class,'home'])->name('userHome');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/save/{book}', [BookController::class, 'save'])->name('books.save');
});



//googl login github login
Route::get('/auth/{provider}/redirect',[SocialLoginController::class,'redirect']);

Route::get('/auth/{provider}/callback',[SocialLoginController::class,'callback']);

require __DIR__.'/auth.php';
