<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function(){
    route::get('home',[AdminController::class,'adminPage'])->name('adminPage');

});
