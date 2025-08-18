<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookController extends Controller
{
    //create Book
    public function create(){
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.book.create', compact('categories','authors'));
    }

    // store Book
    public function store(Request $request){
        $this->checkBookValidation($request);

        $data = $this->requestBookData($request);

        if($request->hasFile('image')){

             //create new author image
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/book/' , $fileName);
            $data['image'] = $fileName;

        }

        if ($request->hasFile('pdfPath')) {
            $pdfName = uniqid() . $request->file('pdfPath')->getClientOriginalName();
            $request->file('pdfPath')->move(public_path().'/pdf/', $pdfName);
            $data['pdf_path'] = $pdfName;
        }

         Book::create($data);

        Alert::success('Account updated successfully');
        return to_route('author#list');
    }

    private function requestBookData($request){
        return([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->categoryId,
            'author_id' => $request->authorId,
            'release_year' => $request->release_year,

        ]);
    }

    private function checkBookValidation($request){
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'categoryId' => 'required',
            'authorId' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'pdfPath' => 'mimes:pdf|max:2048',
            'release_year' => 'required|min:1900|max:'.date('Y'),
        ]);
    }
}
