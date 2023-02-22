<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transaksi.index', [
            'title' => 'Transaksi',
            'transaksis' => Transaksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_status = ['baru', 'proses', 'selesai', 'diambil'];
        $all_dibayar = ['telah_bayar', 'belum_bayar'];

        return view('dashboard.transaksi.create', [
            'title' => 'Tambah Transaksi',
            'members' => Member::all(),
            'transaksis' => Transaksi::all(),
            'pakets' => Paket::all(),
            'all_status' => $all_status,
            'all_dibayar' => $all_dibayar,
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
        $validateTransaksi = $request->validate([
            'member_id' => 'required',
            'biaya_tambahan' => 'required|max:10',
            'diskon' => 'required|max:2',
            'dibayar' => 'required',
        ]);

        $validateTransaksi['kode_invoice'] = Str::uuid();
        $validateTransaksi['outlet_id'] = auth()->user()->outlet_id;
        $validateTransaksi['tgl'] = today();
        $validateTransaksi['batas_waktu'] = Carbon::create(today())->addDays(5);
        $validateTransaksi['diskon'] = $request->diskon . '%';
        $validateTransaksi['pajak'] = 1000;
        $validateTransaksi['user_id'] = auth()->user()->id;

        Transaksi::create($validateTransaksi);
        return redirect('/dashboard/transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
