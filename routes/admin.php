<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','middleware' => 'admin'], function(){
    route::get('home',[AdminController::class,'adminPage'])->name('adminPage');

    route::group(['prefix' => 'catgory'], function(){
        route::get('list',[CategoryController::class,'list'])->name('category#list');
        route::post('create',[CategoryController::class,'create'])->name('category#create');
        route::get('update/{id}',[CategoryController::class,'updatePage'])->name('category#updatePage');
        route::post('update/{id}',[CategoryController::class,'update'])->name('category#update');
        route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
    });
});
