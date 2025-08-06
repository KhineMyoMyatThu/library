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

        $data = $this->requestProfileData($request);

        if($request->hasFile('image')){
            $fileName = uniqid().request()->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/profile/',$fileName);
            $data['profile'] =$fileName;
        }else{
            $data['profile'] = Auth::user()->profile;
        }
     User::where('id',Auth::user()->id)->update($data);

     Alert::success('Account updated successfully');
     return to_route('profile#editAccount');


    }

    private function requestProfileData($request){
        return([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
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
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'phone' => 'required|unique:users,phone,'.Auth::user()->id,
            'address'=> 'required|max:255'


        ]);
    }
}
