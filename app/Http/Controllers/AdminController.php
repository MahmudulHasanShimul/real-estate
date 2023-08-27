<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.admin-dashboard.index');
    }

    public function adminLogin(){
        return view('admin.admin-dashboard.admin-login');
    }

    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }

    public function adminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin-dashboard.admin-profile',['profileData' => $profileData]);
    }
    
    public function getImageUrl($request){
        if($request->photo){
            $photo = $request->photo;
            $photoName = 'admin-image' . rand(0,100000) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('/upload/admin-image'),$photoName);
            $photoUrl = 'upload/admin-image/' . $photoName;
            return $photoUrl;
        }
    }

    public function adminProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $profileData            = User::find($id);
        $profileData->username  = $request->username;
        $profileData->name      = $request->name;
        $profileData->email     = $request->email;
        $profileData->phone     = $request->phone;
        $profileData->address   = $request->address;
        if($request->photo){
            if(file_exists($profileData->photo)){
                unlink($profileData->photo);
            }
            $profileData->photo = $this->getImageUrl($request);
        }
        $profileData->save();
        
        $notification = [
            'message' => 'Admin Profile is upadted successfully',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }

    public function adminChangePassword(){
        $id = Auth::user()->id;
        return view('admin.admin-dashboard.change-password', ['profileData' => User::find($id)]);
    }

    public function adminUpdatePassword(Request $request){

        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        //Match the old password
        if(!Hash::check( $request->old_password, Auth::user()->password)){
            $notification = [
                'message' => 'Old password does not match',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }

        //update new passowrd
        User::whereId(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
        $notification = [
            'message' => 'Password changes Successfully',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }
}
