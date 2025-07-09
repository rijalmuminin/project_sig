<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || ($request->routeIs('kategori.*', 'gedung.*', 'lantai.*', 'petugas.*') && Auth::user()?->role !== 1)) {
            abort(403, 'Tidak memiliki akses ke halaman ini');
        }

        return $next($request);
    }
}
