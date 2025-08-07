<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //create author page

    public function create(){
        return view('admin.author.create');
    }
}
