<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Container\Attributes\Auth;

Route::group(['prefix' => 'admin','middleware' => 'admin'], function(){
    route::get('home',[AdminController::class,'adminPage'])->name('adminPage');

    route::group(['prefix' => 'catgory'], function(){
        route::get('list',[CategoryController::class,'list'])->name('category#list');
        route::post('create',[CategoryController::class,'create'])->name('category#create');
        route::get('update/{id}',[CategoryController::class,'updatePage'])->name('category#updatePage');
        route::post('update/{id}',[CategoryController::class,'update'])->name('category#update');
        route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
    });

     route::group(['prefix' => 'profile'], function(){
        route::get('password',[ProfileController::class,'changePassword'])->name('profile#changePassword');
        route::post('password/update',[ProfileController::class,'update'])->name('profile#updatePassword');

        route::get('account',[ProfileController::class,'account'])->name('profile#account');
        route::get('account/edit',[ProfileController::class,'editAccount'])->name('profile#editAccount');
        route::post('account/update', [ProfileController::class,'updateAccount'])->name('profile#updateAccount');

    });


    route::group(['prefix'=> 'author'], function(){
        route::get('create',[AuthorController::class,'create'])->name('author#create');
        route::post('store',[AuthorController::class,'store'])->name('author#store');
        route::get('list',[AuthorController::class,'list'])->name('author#list');
        route::get('update/{id}',[AuthorController::class,'updatePage'])->name('author#updatePage');
        route::post('update/{id}',[AuthorController::class,'update'])->name('author#update');
        route::get('delete/{id}',[AuthorController::class,'delete'])->name('author#delete');

    });


    route::group(['prefix'=> 'book'],function(){
        route::get('create',[BookController::class,'create'])->name('book#create');
        route::post('store',[BookController::class,'store'])->name('book#store');
    });


});
