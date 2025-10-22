<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function attemptLogin(string $identifier, string $password)
    {
        $loginType = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' :
            (preg_match('/^\d+$/', $identifier) ? 'whatsapp' : 'username');

        $user = User::where($loginType, $identifier)->first();

        if ($user && Hash::check($password, $user->password)) {
            return [
                'success' => true,
                'user' => $user,
                'role' => $user->role
            ];
        }

        return ['success' => false];
    }
}
