<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Hardcoded email dan password
        $validEmail = 'arkanattaqy09@gmail.com';
        $validPassword = 'attaqy81';

        // Pengecekan apakah email dan password sesuai
        if ($request->email === $validEmail && $request->password === $validPassword) {
            // Simpan informasi user ke session
            session(['user' => $validEmail]);

            return redirect()->route('portfolio.edit');
        } else {
            // Jika login gagal
            return back()->withErrors(['email' => 'Email atau password salah']);
        }
    }

    public function logout(Request $request)
    {
        // Hapus informasi user dari session
        $request->session()->forget('user');
        
        return redirect()->route('login');
    }
}
