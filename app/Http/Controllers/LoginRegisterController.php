<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function login()
    {
        return view('login-register.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $login = request()->input('login');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $login]);

        $credentials = $request->validate([
            $fieldType => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Gagal Login!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function register()
    {
        return view('login-register.register', [
            'title' => 'Register'
        ]);
    }

    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|min:3|max:30|alpha_dash|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|letters|numbers|confirmed',
            'outlet_id' => 'required',
            'roles' => 'required',
        ]);

        $validatedData['nama'] = ucwords($request->nama);
        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Pengguna berhasil ditambahkan!');
    }
}
