<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin {
    public function handle(Request $request, Closure $next)
{
    // Pertama cek apakah user sudah login
    if (!Auth::check()) {
        return redirect()->route('login'); // Menggunakan named route
    }

    // Kemudian cek apakah admin
    if (!Auth::user()->is_admin) {
        abort(403, 'Akses ditolak. Hanya admin yang boleh mengakses.');
    }

    return $next($request);
}
}
