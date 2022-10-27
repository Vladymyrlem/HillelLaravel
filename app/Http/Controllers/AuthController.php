<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login()
    {
        $urlGitHub = 'https://github.com/login/oauth/authorize';
        $parameters = [
            'client_id' => getenv('OAUTH_GITHUB_CLIENT_ID'),
            'redirect_uri' => getenv('OAUTH_GITHUB_REDIRECT_URI'),
            'scope' => 'user',
        ];
        $urlGitHub .= '?' . http_build_query($parameters);
        return view('auth.form', compact('urlGitHub'));
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['email', 'required', 'exists:users'],
            'password' => ['required', 'min:5'],
        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($data['password']);
                $user->save();
            }
            //$request->session()->regenerate();
            return redirect()->route('admin.index');
        }
        return back()->withErrors([
            'error' => 'Not email or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
