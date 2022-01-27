<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function userProfile()
    {
        $adminData = User::find(1);

        return view('backend.admin.admin_profile', compact('adminData'));
    }
}
