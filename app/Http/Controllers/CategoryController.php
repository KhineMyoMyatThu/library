<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //

    public function list(){
        $categories = Category::orderBy('created_at','desc')->paginate(3);
        return view('admin.category.list', compact('categories'));
    }

    #create category
    public function create(Request $request){
        $this->checkValidation($request);

        Category::create([
            'name' => Str::studly(trim($request->categoryName)),
            'created_at' => Carbon::now(),
        ]);

        Alert::success('category is added','successfully added');
        return back();

    }

    #update Page
    public function updatePage($id){

        $category = Category::where('id',$id)->first();

        return view('admin.category.update', compact('category'));
    }

    #update category
    public function update(Request $request, $id){
        $this->checkValidation($request);

        Category::where('id',$id)->update(
            [
                'name' => Str::studly(trim($request->categoryName)),
                'created_at' => Carbon::now()
            ]
            );

            Alert::success('category is updated','successfully updated');
            return to_route('category#list');
    }

    public function delete($id){
        Category::where('id',$id)->delete();
        Alert::success('category is deleted','successfully deleted');
        return back();
    }

    #check category name validation
    private function checkValidation($request){
        $request->validate(
            [
                'categoryName' => 'required|max:255|unique:categories,name',

            ],[
                'categoryName.required' =>'အမျိုးအစားအမည် လိုအပ်သည်',
                'categoryName.unique' => 'ဤအမျိုးအစားအမည်ရှိပြီးသားဖြစ်သည်'
            ]
            );
    }
}
