<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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
            'title' => 'Register',
        ]);
    }

    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|min:3|max:30|alpha_dash|unique:users',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(5)->letters()->numbers()],
        ]);

        $validatedData['nama'] = ucwords($request->nama);
        $validatedData['password'] = Hash::make($request->password);
        $validatedData['outlet_id'] = auth()->user()->outlet_id;
        $validatedData['roles'] = 'pengguna';

        User::create($validatedData);
        return redirect('/dashboard')->with('success', 'Pengguna berhasil ditambahkan!');
    }
}
