<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $role = Auth::user()->role ?? 'user';
            if ($role === 'admin') {
                return redirect('/admin/dashboard');
            }
            if ($role === 'mitra') {
                return redirect('/mitra/dashboard');
            }
            return redirect('/user/dashboard');
        }

        return $next($request);
    }
}