<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //password change page
    public function changePassword(){
        return view('admin.profile.passwordChange');
    }

    //password update
    public function update(Request $request){
        $this->checkValidation($request);

        $currentPassword = Auth::user()->password;

        if(Hash::check($request->oldPassword, $currentPassword)){
            User::where('id',(Auth::user()->id))->update([
                'password'=> Hash::make($request->newPassword)
            ]);

            Alert::success('Password changed successfully');
            return back();
        }else{
            Alert::error('Old pasword does not match');
            return back();
        }

    }


    //account page
    public function account(){
        return view('admin.profile.accountProfile');
    }

    public function editAccount(){
        return view('admin.profile.editAccount');
    }

    public function updateAccount(Request $request){
        $this->checkAccountValidation($request);

        auth()->user()->update([
            'name' -> $request->name,
            'email' -> $request->email,
            'phone' -> $request->phone,
            'address' -> $request->address,
        ]);



    }

    //validation check for password change
    private function checkValidation($request){
        $request->validate(
            [
                'oldPassword' => 'required|min:8|max:15',
                'newPassword' => 'required|min:8|max:15',
                'confirmPassword' => 'required|min:8|max:15|same:newPassword',
            ]
            );
    }

    private function checkAccountValidation($request){
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique',
            'phone' => 'required|min:11|max:11',
            'address' => 'required|min:5|max:50',
            // 'image' => 'mimes:jpg,jpeg,png,gif,webp'
        ]);
    }
}
