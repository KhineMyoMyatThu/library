<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    //
    public function guestPage(){


      $books = Book::select('books.id','books.title','books.image','books.author_id', 'authors.name as book_author')
        ->leftjoin('authors','books.author_id','authors.id')->get();

        $authors = Author::select('authors.id','authors.name','authors.image','books.title as book_title')
        ->leftjoin('books','authors.id','=','books.author_id')
        -> get();



        $categories = Category::all();
    // return view('guest.guestPage',compact('books','authors','categories'));

        return view('user.home.guestPage',compact('books','authors','categories'));
    }

    // public function booklist(){
    //     return view('user.home.books');
    // }

}
