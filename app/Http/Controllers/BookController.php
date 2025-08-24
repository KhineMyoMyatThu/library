<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $this->checkBookValidation($request,'create');

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
        return to_route('book#list');
    }

    //list book
    public function list(){
        $books = Book::select('books.id','books.title','books.description','books.image',
        'books.pdf_path','books.release_year','books.created_at','categories.id as category_id','categories.name as category_name','authors.id as author_id','authors.name as author_name')
        ->leftJoin('categories','books.category_id','categories.id')
        ->leftJoin('authors','books.author_id','authors.id')
        ->orderBy('books.created_at','desc')->paginate(3);

        return view('admin.book.list',compact('books'));
    }

    //direct to update page
    public function updatePage($id){
        $book = Book::select('books.id','books.title','books.description','books.image',
        'books.pdf_path','books.release_year','categories.id as category_id','categories.name as category_name','authors.id as author_id','authors.name as author_name')
        ->leftJoin('categories','books.category_id','categories.id')
        ->leftJoin('authors','books.author_id','authors.id')
        ->where('books.id',$id)->first();


        $categories = Category::all();
        $authors = Author::all();

        return view('admin.book.update',compact('book','categories','authors'));
    }

    //update book
    public function update(Request $request, $id){
        $this->checkBookValidation($request, 'update');

        $data = $this->requestBookData($request);
        $book = Book::findOrFail($id);

        if($request->hasFile('image')){

               //delete old image first
            if($book->image != null){
                if(file_exists(public_path('/book/'.$book->image))){
                    Storage::disk('public')->delete('pdf/' . $book->pdf_path);
                }
            }
            //create new author image
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/book/' , $fileName);
            $data['image'] = $fileName;

        }

        if ($request->hasFile('pdfPath')) {

               //delete old file first
            if($book->pdf_path != null){
                if(file_exists(public_path('/pdf/'.$book->pdf_path))){
                    unlink(public_path('/pdf/'.$book->pdf_path));
                }
            }
            $pdfName = uniqid() . $request->file('pdfPath')->getClientOriginalName();
            $request->file('pdfPath')->move(public_path().'/pdf/', $pdfName);
            $data['pdf_path'] = $pdfName;
        }

        Book::where('id',$id)->update($data);

        Alert::success('Book updated successfully');
        return to_route('book#list');
    }

    //delete book
    public function delete($id){
        Book::where('id',$id)->delete();
        Alert::success('Book deleted successfully');
        return to_route('book#list');
    }

    private function requestBookData($request){
        return([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->categoryId,
            'author_id' => $request->authorId,
            'release_year' => $request->releaseYear,

        ]);
    }

    private function checkBookValidation($request ,$action){
       $rule =[
            'title' => 'required',
            'description'=> 'required',
            'categoryId' => 'required',
            'authorId' => 'required',
            'pdfPath' => 'required|mimes:pdf',
            'releaseYear' => 'required',
        ];

        $rule['image'] = $action == 'create' ? 'required|mimes:png,jpeg,jpg,webp|file' : 'mimes:png,jpeg,jpg,webp|file';

        $rule['pdfPath'] = $action == 'create' ? 'required|mimes:pdf' : 'mimes:pdf';


        $message = [];
        $request->validate($rule,$message);
    }
}
