<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('page.login');
    }
    

    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $role = strtolower(Auth::user()->role);

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($role === 'guru') {
            return redirect()->route('guru.dashboard');
        }

        Auth::logout();
        return redirect('/login')->withErrors([
            'username' => 'Role user tidak dikenali',
        ]);
    }

    return back()->withErrors([
        'username' => 'Username atau password salah',
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
