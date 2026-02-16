<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showloginform() {
        $title = 'login';
        return view('auth.login', compact('title'));
    }

    public function Login(Request $request) {
    $credentials = $request->only('username', 'password');
    if(Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('aspirasi.index');
    }

    return back()->withErrors(['username' => 'username atau password salah']);
  }

  public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')->with('success', 'Logout berhasil.');
}
}
