<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function agentProfile()
    {
        $id = Auth::user()->id;
        return view('website.agent.agent-profile', ['profileData' => User::find($id)]);
    }

    public function getImageUrl($request)
    {
        if ($request->photo) {
            $image = $request->photo;
            $imageName = 'agent-image' . rand(0, 1000000) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/upload/agent-image'), $imageName);
            $imageUrl = 'upload/agent-image/' . $imageName;
        } else {
            $imageUrl = null;
        }

        return $imageUrl;
    }

    public function agentProfileUpdate(Request $request)
    {
        $id                    = Auth::user()->id;
        $profileData           = User::find($id);
        $profileData->username = $request->username;
        $profileData->name     = $request->name;
        $profileData->email    = $request->email;
        $profileData->phone    = $request->phone;
        $profileData->address  = $request->address;
        if ($request->photo) {
            if (file_exists($profileData->photo)) {
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

    public function agentChangePassword(){
        $id = Auth::user()->id;
        return view('website.agent.agent-change-password',['profileData' => User::find($id)]);
    }

    public function agentUpdatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){
            $notification = [
                'message'    => 'Old password does not match',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }

        User::whereId(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
        $notification = [
            'message'       => 'Your Password is updated successfully',
            'alert-type'    => 'success'
        ];

        return back()->with($notification);
    }
}
