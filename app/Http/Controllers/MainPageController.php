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
    public function home(Request $request){

        $books = Book::select( 'books.id',
        'books.title',
        'books.image',
        'authors.name as author_name',
        'authors.image as author_image',
        'books.release_year',
        'books.category_id',
        'categories.name as category_name'
        )
        ->leftJoin('authors','books.author_id','=','authors.id')
        ->leftJoin('categories','books.category_id','=','categories.id')->get();
        $authors = Author::take(8)->get();
        $categories = Category::all();

        return view('user.home.home', compact('books','authors','categories'));



    }

   public function search(Request $request){

    $search = $request->input('searchKey');
    $books = Book::select(
        'books.id',
        'books.title',
        'books.image',
        'authors.name as author_name',
        'authors.image as author_image',
        'books.release_year',
        'books.category_id',
        'categories.name as category_name'
        )
        ->leftJoin('authors','books.author_id','=','authors.id')
        ->leftJoin('categories','books.category_id','=','categories.id')
        ->where(function($q) use ($search){
            $q->where('books.title','like','%'.$search.'%')
              ->orWhere('authors.name','like','%'.$search.'%')
              ->orWhere('categories.name','like','%'.$search.'%');
        })
        ->paginate(12)
        ->withQueryString();


        $authors = Author::select('authors.*')
        ->where('authors.name','like','%'.$search.'%')
        ->distinct()
        ->get();



        $categories = Category::all();
        return view('user.search.result',compact('books','authors','categories','search'));
   }

}
