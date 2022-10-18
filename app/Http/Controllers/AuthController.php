<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login()
    {
        return view('auth/form');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:5'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($credentials['password']);
                $user->save();
            }
            $request->session()->regenerate();
            return redirect()->route('admin');
        }
        return back()->withErrors([
            'error' => 'Not email or password'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main');
    }
}
