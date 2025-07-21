<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    //
    public function guestPage(){

        if(Auth::check()){
            $user = auth()->user;

            if($user->role() == 'user'){
                return redirect()->route('userPage');
            }elseif($user->role() == 'admin'){
                return redirect()->route('adminPage');
            }
        }
        return view('user.home.guest');
    }

}
