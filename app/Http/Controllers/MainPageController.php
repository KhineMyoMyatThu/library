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

        if(Auth::check()){
            $user = auth()->user;

            if($user->role() == 'user'){
                return redirect()->route('userPage');
            }elseif($user->role() == 'admin'){
                return redirect()->route('adminPage');
            }
        }

        $books = Book::select('books.id','books.title','books.image','books.author_id', 'authors.name as book_author')
        ->leftjoin('authors','books.author_id','authors.id')->get();

        // $authors = Author::select('authors.id','authors.name','authors.image', 'authors.book_id as book_id','books.title as book_title')
        // ->leftjoin('books','authors.id','=','books.author_id')
        // ->withCount('book_id')
        // ->where('books.id','==','authors.book_id')
        // -> get();


        dd($authors);
        $categories = Category::all();

        return view('user.home.guest',compact('books','authors','categories'));
    }

}
