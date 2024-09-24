<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    public function handle(Request $request, Closure $next)
    {
        // Jika user belum login, arahkan ke halaman login
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
