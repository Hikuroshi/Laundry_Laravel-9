<?php

namespace App\Http\Controllers;

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
            'title' => 'Paket Cucian'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.paket.create', [
            'title' => 'Tambah Paket Cucian'
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
            'nama_paket' => 'required|max:100',
            'outlet_id' => 'required',
            'jenis' => 'required',
            'harga' => 'required|max:11',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Paket::class, 'slug', $request->nama_paket);

        Paket::create($validatedData);
        return redirect('/dashboard/paket')->with('success', 'Paket berhasil ditambahkan!');
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
            'nama_paket' => 'required|max:100',
            'outlet_id' => 'required',
            'jenis' => 'required',
            'harga' => 'required|max:11',
        ]);

        $validatedData['nama'] = ucwords($request->nama_paket);
        $validatedData['slug'] = SlugService::createSlug(Paket::class, 'slug', $request->nama_paket);

        Paket::where('id', $paket->id)->update($validatedData);
        return redirect('/dashboard/paket')->with('success', 'Paket berhasil diperbarui!');
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
        return redirect('/dashboard/paket')->with('success', 'Paket berhasil dihapus!');
    }
}
