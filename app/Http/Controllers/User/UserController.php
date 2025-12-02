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

        $books = Book::select('books.id','books.title','books.image','books.author_id', 'authors.name as book_author')
        ->leftjoin('authors','books.author_id','authors.id')->get();


        $authors = Author::select('authors.id','authors.name','authors.image', 'authors.book_id as book_id','books.title as book_title')
        ->leftjoin('books','authors.id','=','books.author_id')
        -> get();

        $categories = Category::all();
        return view('user.home.userPage', compact('books','authors','categories'));

    }
}
