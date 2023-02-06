<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Validator;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.outlet.index', [
            'title' => 'Outlet',
            'outlets' => Outlet::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.outlet.create', [
            'title' => 'Tambah Outlet'
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
            'alamat' => 'required',
            'telepon' => ['required', 'min:11', 'max:13', 'unique:outlets', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/'],
        ],
        [
            'telepon.regex' => 'The telepon must be start with: +62/62/0.',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Outlet::class, 'slug', $request->nama);

        Outlet::create($validatedData);
        return redirect('/dashboard/outlets')->with('success', 'Outlet berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        return view('dashboard.outlet.show', [
            'title' => 'Lihat Outlet',
            'outlets' => $outlet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        return view('dashboard.outlet.edit', [
            'title' => 'Edit Outlet',
            'outlet' => $outlet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'telepon' => ['required', 'min:11', 'max:13', 'unique:outlets', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/'],
        ],
        [
            'telepon.regex' => 'The telepon must be start with: +62/62/0.',
        ]);

        $validatedData['nama'] = ucwords($request->nama);
        $validatedData['slug'] = SlugService::createSlug(Outlet::class, 'slug', $request->nama);

        Outlet::where('id', $outlet->id)->update($validatedData);
        return redirect('/dashboard/outlets')->with('success', 'Outlet berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        Outlet::destroy($outlet->id);
        return redirect('/dashboard/outlets')->with('success', 'Outlet berhasil dihapus!');
    }
}
