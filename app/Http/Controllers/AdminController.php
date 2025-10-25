<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


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
            'g-recaptcha-response' => 'required', 
        ]);

        
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $recaptcha = $response->json();

        if (!($recaptcha['success'] ?? false)) {
            return back()->with('error', 'Captcha verification failed. Please try again.');
        }

        
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logged_in' => true, 'admin_username' => $admin->username]);
            return redirect()->route('admin.list_home_contents_admin');
        } else {
            return back()->with('error', 'Wrong username or password!');
        }
    }


}