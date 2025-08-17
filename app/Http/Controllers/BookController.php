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

        if ($request->hasFile('pdf')) {
            $pdfName = uniqid() . $request->file('pdf')->getClientOriginalName();
            $request->file('pdf')->move(public_path('book/pdf/'), $pdfName);
            $data['pdf'] = $pdfName;
        }

         Author::create($data);

     Alert::success('Account updated successfully');
     return to_route('author#list');
    }

    private function requestBookData($request){
        return([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->categoryId,
            'author_id' => $request->authorId,
        ]);
    }

    private function checkBookValidation($request){
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'categoryId' => 'required',
            'authorId' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'pdfPath' => 'nullable|mimes:pdf|max:2048',
        ]);
    }
}
