<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('admin_logged_in') || session('admin_logged_in') !== true) {
            return redirect()->route('admin.login')->with('error', 'Please log in first!');
        }

        return $next($request);
    }

}