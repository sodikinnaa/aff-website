<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        
        // Jika sudah login, redirect ke halaman sesuai role jika berada di /login
        $user = auth()->user();
        $roleRouteMap = [
            'admin' => '/admin/dashboard',
            'affiliator' => '/user/dashboard',
            'mitra' => '/mitra/dashboard',
        ];

        $currentPath = $request->path();
        // Jika path adalah 'login', redirect ke dashboard sesuai rolenya
        if ($currentPath === 'login' && isset($roleRouteMap[$user->role])) {
            return redirect($roleRouteMap[$user->role]);
        }

        return $next($request);
    }
}
