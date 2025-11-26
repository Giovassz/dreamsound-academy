<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            if (!$user->is_active) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Tu cuenta está desactivada. Contacta al administrador.',
                ]);
            }

            return redirect()->intended($this->redirectTo());
        }

        throw ValidationException::withMessages([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    protected function redirectTo()
    {
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            return '/admin/dashboard';
        } elseif ($user->isStaff()) {
            return '/staff/dashboard';
        } else {
            return '/dashboard';
        }
    }
}

