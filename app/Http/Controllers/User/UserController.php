<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //direct Main page
    public function userPage() {
        return view('user.home.userPage');

    }
}
