<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsPetugas
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan pengguna sudah login dan memiliki role 'petugas'
        if (Auth::check() && Auth::user()->role === 'petugas') {
            return $next($request);
        }

        // Redirect ke halaman lain jika bukan petugas
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}