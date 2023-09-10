<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function agentOrUserLogin()
    {
        return view('website.auth.login');
    }

    public function agentLogOut(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('agent-or-user.login'));
    }

    public function userLogOut(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('agent-or-user.login'));
    }

    public function createProfile()
    {
        return view('website.auth.create-profile');
    }

    public function getImageUrl($request)
    {
        if ($request->photo) {
            $image = $request->photo;
            if ($request->role == 'user') {
                $imageName = 'user-image' . rand(0, 100000) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/upload/user-image'), $imageName);
                $imageUrl = 'upload/user-image/' . $imageName;
            } else {
                $imageName = 'agent-image' . rand(0, 100000) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/upload/agent-image'), $imageName);
                $imageUrl = 'upload/agent-image/' . $imageName;
            }
        } else {
            $imageUrl = null;
        }

        return $imageUrl;
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users,email',
            'password'  => 'required|confirmed',
            'phone'     => 'unique:users,phone'
        ]);

        $createUser             = new User();
        $createUser->name       = $request->name;
        $createUser->username   = $request->username;
        $createUser->email      = $request->email;
        $createUser->password   = Hash::make($request->password);
        $createUser->phone      = $request->phone;
        $createUser->address    = $request->address;
        $createUser->photo      = $this->getImageUrl($request);
        $createUser->role       = $request->role;
        $createUser->save();

        $notification = [
            'message'    => 'New User is Created successfully',
            'alert-type' => 'success'
        ];

        return redirect(route('agent-or-user.login'))->with($notification);
    }
}
