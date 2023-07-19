<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Menampilkan Tampilan Login
class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    // Cek Validasi Login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            //'email' => 'required|email:dns', //email:dns untuk membuat semakin ketat penjagaan emailnya
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        //kalo berhasil dia akan menjalankan if ini
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect("/dashboard");
        }

        return back()->with('loginError', 'Login Failed');
    }

    // Fungsi logout bawaan laravel
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
