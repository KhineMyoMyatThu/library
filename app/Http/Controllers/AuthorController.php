<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthorController extends Controller
{
    // author page

    public function create(){
        return view('admin.author.create');
    }

    //create author
    public function store(Request $request){
        $this->checkValidation($request);

        $data = $this->requestAuthorData($request);


        if($request->hasFile('image')){


            //create new author image
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/author/' , $fileName);
            $data['image'] = $fileName;
        }

         Author::create($data);

     Alert::success('Account updated successfully');
     return to_route('author#list');



    }

    //author list
    public function list(){
        $authors = Author::orderBy('created_at','desc')->paginate(3);

        return view('admin.author.list',compact('authors'));
    }

    private function requestAuthorData($request){
        return([
            'name' => $request->name,
            'biography' => $request->biography,

        ]);
    }

    private function checkValidation($request){
        $request->validate([
            'name' => 'required',
            'biography' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp'
        ]);
    }

}
