<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    //
    public function mainPage(){
        $user = Auth::user();
        $isVerified = false;

          if ($user && $user->email_verified_at) {
            $isVerified = true;
        }

        return view('user.home.main', [
            'user' => $user,
            'isVerified' => $isVerified,
        ]);

    }
}
