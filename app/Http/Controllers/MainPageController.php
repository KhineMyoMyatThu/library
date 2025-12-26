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


      $books = Book::select(
        'books.id',
        'books.title',
        'books.image',
        'authors.name as book_author',
        'books.release_year',
        'books.category_id',
        'categories.name as category_name'
        )
        ->leftJoin('authors','books.author_id','=','authors.id')
        ->leftJoin('categories','books.category_id','=','categories.id')
        ->when($request->filled('searchKey'),function($query ) use ($request){
            $query->where(function($q) use ($request){
                 $q->where('books.title','like','%'.$request->searchKey.'%')
                    ->orWhere('authors.name','like','%'.$request->searchKey.'%')
                    ->orWhere('categories.name','like','%'.$request->searchKey.'%');
            });
        })
        ->paginate(12)
        ->withQueryString();


        $authors = Author::when($request->filled('searchKey'),function($query)use ($request){
            $query->where('name','like','%'.$request->searchKey.'%');
        })->get();



        $categories = Category::all();
        return view('user.home.home',compact('books','authors','categories'));
    }

    // public function booklist(){
    //     return view('user.home.books');
    // }

}
