<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $type)
    {
        if (!auth()->check()) {
            // Pengguna belum login, arahkan ke halaman login
            return redirect()->route('login');
        }
    
        $allowedRoles = collect($type);
    
        if (!$allowedRoles->contains(auth()->user()->type)) {
            // Pengguna mencoba mengakses rute yang tidak sesuai, arahkan ke rute sesuai perannya
            switch (auth()->user()->type) {
                case 'admin':
                    return redirect()->route('posts.index');
                case 'operator':
                    return redirect()->route('posts2.index');
                case 'gudang':
                    return redirect()->route('warehouse2.index');
                case 'ekspedisi':
                    return redirect()->route('ekspedisi2.index');
                default:
                    return redirect()->route('posts.index');
            }
        }
    
        return $next($request);
    }
}
