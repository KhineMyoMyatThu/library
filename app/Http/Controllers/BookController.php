<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookController extends Controller
{
    //create Book
    public function create(){
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.book.create', compact('categories','authors'));
    }
}
