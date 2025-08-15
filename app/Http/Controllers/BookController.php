<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //create Book
    public function create(){
        return view('admin.book.create');
    }
}
