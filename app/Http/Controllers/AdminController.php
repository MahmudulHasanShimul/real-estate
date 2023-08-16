<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
