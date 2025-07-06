<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //direct admin page
    public function adminPage(){
        return view('admin.home.list');
    }
}
