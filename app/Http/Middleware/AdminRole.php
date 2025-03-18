<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    public function handle(Request $request, Closure $next, $admin): Response
    {
        // Pastikan pengguna sudah login dan memiliki admin 'petugas'
        if($admin == 'admin'){
            if (Auth::check() && Auth::user()->role == 'admin') {
                return $next($request);
            } else{
                return redirect()->back();
            }
        }

        // Redirect ke halaman lain jika bukan petugas
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
