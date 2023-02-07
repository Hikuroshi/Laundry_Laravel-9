<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.paket.index', [
            'title' => 'Paket Cucian',
            'pakets' => Paket::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_paket = ['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain'];

        return view('dashboard.paket.create', [
            'title' => 'Tambah Paket Cucian',
            'outlets' => Outlet::all(),
            'jenis_paket' => $jenis_paket
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
            'outlet_id' => 'required',
            'jenis' => 'required',
            'harga' => 'required|max:11',
        ]);

        $validatedData['nama'] = ucwords($request->nama);
        $validatedData['slug'] = SlugService::createSlug(Paket::class, 'slug', $request->nama);

        Paket::create($validatedData);
        return redirect('/dashboard/pakets')->with('success', 'Paket berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        return view('dashboard.paket.show', [
            'title' => 'Lihat Paket Cucian',
            'paket' => $paket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        return view('dashboard.paket.edit', [
            'title' => 'Edit Paket Cucian',
            'paket' => $paket
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'outlet_id' => 'required',
            'jenis' => 'required',
            'harga' => 'required|max:11',
        ]);

        $validatedData['nama'] = ucwords($request->nama);
        $validatedData['slug'] = SlugService::createSlug(Paket::class, 'slug', $request->nama);

        Paket::where('id', $paket->id)->update($validatedData);
        return redirect('/dashboard/pakets')->with('success', 'Paket berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        Paket::destroy($paket->id);
        return redirect('/dashboard/pakets')->with('success', 'Paket berhasil dihapus!');
    }
}
