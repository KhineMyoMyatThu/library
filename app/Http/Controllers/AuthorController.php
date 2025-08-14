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
        $this->checkValidation($request,'create');

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

    //author updatepage
    public function updatePage($id){
        $author = Author::where('id',$id)->first();
        return view('admin.author.update',compact('author'));
    }

    //author update
    public function update(Request $request,$id){
        $this->checkValidation($request,'update');

        $data = $this->requestAuthorData($request);

       $author = Author::findOrFail($id);


        if($request->hasFile('image')){
            //delete old image first
            if($author->image != null){
                if(file_exists(public_path('/author/'.$author->image))){
                    unlink(public_path('/author/'.$author->image));
                }
            }
   //store new image
            $fileName = uniqid().request()->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/author/',$fileName);
            $data['image'] =$fileName;

        }else{
             $data['image'] = $author->image;
        }

        Author::where('id',$id)->update($data);
        Alert::success('Account updated successfully');
        return to_route('author#list');

    }

    private function requestAuthorData($request){
        return([
            'name' => $request->name,
            'biography' => $request->biography,

        ]);
    }

    private function checkValidation($request,$action){
        $rule =[
            'name' => 'required',
            'biography' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp'
        ];

        $rule['image'] = $action == 'create' ? 'required|mimes:png,jpeg,jpg,webp|file' : 'mimes:png,jpeg,jpg,webp|file';

        $message = [];
        $request->validate($rule,$message);
    }

}
