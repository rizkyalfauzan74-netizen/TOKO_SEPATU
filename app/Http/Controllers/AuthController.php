<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // halaman login
    public function showLogin()
    {
        return view('login');
    }

    // proses login
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi',
            ]
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('products.index');
        }

        return back()
            ->withInput()
            ->withErrors([
                'login_error' => 'Email atau password salah'
            ]);
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}