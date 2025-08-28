<?php

namespace App\Http\Controllers\User;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //direct Main page
    public function userPage() {
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('user.home.userPage', compact('books','authors','categories'));

    }
}
