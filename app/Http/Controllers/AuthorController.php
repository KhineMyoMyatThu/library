<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthorController extends Controller
{
    //create author page

    public function create(){
        $categorise = Category::all();
        return view('admin.author.create' ,compact('categories'));
    }

    //store author
    public function store(Request $request){
        $this->checkValidation($request);

        $data = $this->requestAuthorData($request);


        if($request->hasFile('image')){
            if(file_exists(public_path('author/'.Author::image))){
                inlink(public_path('author/'.Author::image));
            }

            //create new author image
            $fileName = uniqid().request()->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/author/', $fileName);
            $data['image'] = $fileName;
        }else{
              $data['profile'] = Auth::user()->profile;
        }

         Author::where('id',Author::id)->update($data);

     Alert::success('Account updated successfully');
     return to_route('profile');



    }

    private function requestAuthorData($request){
        return([
            'name' => $request->name,
            'biography' => $request->biography,
            'category_id'=> $request->categoryId,
        ]);
    }

    private function checkValidation($request){
        $request->validate([
            'name' => 'required',
            'biography' => 'required',
            'categoryId' => 'required|exists:categories,id',
            'image' => 'mimes:jpg,jpeg,png,webp'
        ]);
    }

}
