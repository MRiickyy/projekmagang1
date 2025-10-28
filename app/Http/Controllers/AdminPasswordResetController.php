<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AdminPasswordResetController extends Controller
{
    
    public function showForm()
    {
        
        session()->forget(['success', 'error', 'email']);

        return view('admin.LupaPasswordAdmin');
    }

   
    public function showResetForm()
    {
        if (!session('email')) {
            return redirect()->route('admin.password.form')->with('error', 'Please enter your email first.');
        }

        return view('admin.resetPasswordForm', ['email' => session('email')]);
    }

   
    public function sendResetCode(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $token = rand(100000, 999999);

        
        DB::table('admin_password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

       
        try {
            Mail::send('admin.emails.reset_password', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Kode Reset Password Admin');
            });
        } catch (\Exception $e) {
            return redirect()->route('admin.password.form')->with('error', 'Failed to send code to email');
        }

        
        session(['email' => $request->email]);

        return redirect()->route('admin.password.resetForm')
                         ->with('success', 'A verification code has been sent to your email. The code is valid for 10 minutes.');
    }

    
    public function resetPassword(Request $request)
    {
        $request->validate([
            
            'token' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $reset = DB::table('admin_password_resets')
            
            ->where('token', $request->token)
            ->first();

        if (!$reset) {
            return redirect()->route('admin.password.resetForm')
                             ->with('email', $request->email)
                             ->with('error', 'Invalid verification code!');
        }

        if (Carbon::parse($reset->created_at)->addMinutes(10)->isPast()) {
            return redirect()->route('admin.password.resetForm')
                             ->with('email', $request->email)
                             ->with('error', 'Verification code has expired!');
        }

        
        DB::table('admins_login')
            ->where('id', 1)
            ->update([
                'password' => Hash::make($request->password),
                'updated_at' => now()
            ]);

        
        DB::table('admin_password_resets')->where('email', $request->email)->delete();

        
        session()->forget('email');

        return redirect()->route('admin.login')
                         ->with('success', 'Password reset successfully! Please log in with the new password.');
    }
}