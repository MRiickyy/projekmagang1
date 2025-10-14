<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function showLoginForm()
    {
        return view('admin.loginAdmin');
    }

   
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Jika berhasil login, arahkan ke halaman admin home
            session(['admin_logged_in' => true, 'admin_username' => $admin->username]);
            return redirect()->route('admin.list_home_contents_admin')->with('success', 'Login berhasil!');
        } else {
            // Jika gagal login
            return back()->with('error', 'Username atau password salah!');
        }
    }

}