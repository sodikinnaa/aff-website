<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    //
    public function showLogin(){
        return view('auth/login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Gunakan AuthService untuk autentikasi
        $authService = app(AuthService::class);
        $result = $authService->attemptLogin($request->input('username'), $request->input('password'));

        if ($result['success']) {
            // Login user secara manual ke sesi Laravel
            auth()->login($result['user']);

            // Redirect sesuai role
            $role = $result['role'];
            if ($role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role == 'affiliator') {
                return redirect()->route('user.dashboard');
            } elseif ($role == 'mitra') {
                return redirect()->route('mitra.dashboard');
            } else {
                auth()->logout();
                return back()->withErrors([
                    'username' => 'Role anda tidak diijinkan login.',
                ])->withInput();
            }
        } else {
            return back()->withErrors([
                'username' => 'Username/email/WA atau password salah.',
            ])->withInput();
        }
    }
    
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
