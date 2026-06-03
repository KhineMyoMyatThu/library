<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //user account page
    public function account(){
        return view('user.userAccount.profile');
    }

    //edit user account page
    public function editProfile(){
        return view('user.userAccount.editProfile');
    }

    //update user profile page
    public function updateProfile(Request $request){

        $this->checkProfileValidation($request);
        $data = $this->requestProfileData($request);

        if($request->hasFile('image')){
            //delete old image
            if(Auth::user()->profile != null){
                if(file_exists(public_path('profile/'.Auth::user()->profile)))
                    {
                        unlink(public_path('profile/'.Auth::user()->profile));
                }
                }

                //store new image
                $filename = uniqid().$request->file('image')->getclientOriginalName();
                $request->file('image')->move(public_path().'/profile/',$filename);
                $data['profile'] = $filename;


            }else{
                $data['profile'] = Auth::user()->profile;
            }

            User::where('id',Auth::user()->id)->update($data);
            Alert::success('Profile updated successfully');
            return to_route('user#account');



    }


    //change password page
    public function change(){
        return view('user.userAccount.changePassword');
    }


    //update password
    public function update(Request $request){
        $this->checkValidation($request);

        $currentPassword = Auth::user()->password;

        if(Hash::check($request->oldPassword, $currentPassword)){
            User::where('id',(Auth::user()->id))->update([
                'password'=>Hash::make($request->newPassword)
            ]);

            Alert::success('Password changed successfully');
            return back();
        }else{
            Alert::error('Old password does not match');
            return back();
        }



    }
    public function getBookRating($id)
    {
        $rating = Rating::where('user_id', Auth::id())
                        ->where('book_id', $id)
                        ->first();

        return response()->json([
            'success' => true,
            'rating'  => $rating ? $rating->count : null
        ]);
    }

    public function rateBook(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to rate books.',
            ], 401);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'book_id' => $id,
            ],
            [
                'count' => $request->rating,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => $rating->wasRecentlyCreated ? 'Rating submitted successfully' : 'Rating updated successfully',
        ]);
    }

    private function checkProfileValidation(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'phone' => 'nullable|digits:10|unique:users,phone,'.Auth::user()->id,
            'address' => 'nullable|max:70',
            'profile' => 'mimes:jpg,jpeg,png|file|nullable',
        ]);
    }

    private function requestProfileData(Request $request){
        return([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=> $request->phone,
            'address' => $request->address,

        ]);
    }

    private function checkValidation(Request $request){
        $request->validate([
            'oldPassword' => 'required|min:8|max:20',
            'newPassword' => 'required|min:8|max:20',
            'confirmPassword' => 'required|min:8|max:20|same:newPassword'
        ]);
    }
}
