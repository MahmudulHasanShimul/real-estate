<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userProfile(){
        $id = Auth::user()->id;
        return view('website.user.user-profile',['profileData' => User::find($id)]);
    }

    public function getImageUrl($request){
        if($request->photo){
            $image = $request->photo;
            $imageName = 'user-image' . rand(0, 1000000) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/upload/user-image'), $imageName);
            $imageUrl = 'upload/user-image/' . $imageName;
        }else{
            $imageUrl = null;
        }

        return $imageUrl;
    }

    public function userProfileUpdate(Request $request){
        $id                    = Auth::user()->id;
        $profileData           = User::find($id);
        $profileData->username = $request->username;
        $profileData->name     = $request->name;
        $profileData->email    = $request->email;
        $profileData->phone    = $request->phone;
        $profileData->address  = $request->address;
        if($request->photo){
            if(file_exists($profileData->photo)){
                unlink($profileData->photo);
            }
            $profileData->photo  = $this->getImageUrl($request);
        }
        $profileData->save();

        $notification = [
            'message'    => "Your profile is updated successfully",
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }

    public function userChangePassword(){
        $id = Auth::user()->id;
        return view('website.user.user-change-password', ['profileData' => User::find($id)]);
    }

    public function userUpdatePassword(Request $request){
        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        //Match the old password
        if(!Hash::check($request->old_password, Auth::user()->password)){
            $notification = [
                'message'    => 'Old Password does not match',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }

        //Update new Password
        User::whereId(Auth::user()->id)->update(["password" => Hash::make($request->new_password)]);
        $notification = [
            'message'    => 'Password is updated successfully',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }
}
