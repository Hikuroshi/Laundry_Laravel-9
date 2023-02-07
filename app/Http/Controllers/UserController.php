<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'Daftar User',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_roles = ['admin', 'kasir', 'owner'];

        return view('dashboard.user.create', [
            'title' => 'Tambah User',
            'outlets' => Outlet::all(),
            'all_roles' => $all_roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|min:3|max:30|alpha_dash|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => ['required', 'confirmed', Password::min(5)->letters()->numbers()],
            'outlet_id' => 'required',
            'roles' => 'required',
        ]);

        $validatedData['nama'] = ucwords($request->nama);
        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);
        return redirect('/dashboard/users')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $all_roles = ['admin', 'kasir', 'owner'];

        return view('dashboard.user.edit', [
            'title' => 'Tambah User',
            'outlets' => Outlet::all(),
            'user' => $user,
            'all_roles' => $all_roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|min:3|max:30|alpha_dash|unique:users',
            'email' => 'required|email:dns|unique:users',
            'outlet_id' => 'required',
            'roles' => 'required',
        ]);

        $validatedData['nama'] = ucwords($request->nama);

        User::where('id', $user->id)->update($validatedData);
        return redirect('/dashboard/users')->with('success', 'User berhasil perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User berhasil dihapus!');
    }
}
