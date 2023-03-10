<?php

namespace App\Http\Controllers;

use App\Exports\TransaksisExport;
use App\Models\DetailTransaksi;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

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
            'transaksis' => Transaksi::all(),
            'detail_transaksis' => DetailTransaksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_dibayar = ['Telah bayar', 'Belum bayar'];

        return view('dashboard.transaksi.create', [
            'title' => 'Tambah Transaksi',
            'members' => Member::all(),
            'pakets' => Paket::all(),
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

        $validateTransaksi['kode_invoice'] = Str::ulid();
        $validateTransaksi['outlet_id'] = auth()->user()->outlet_id;
        $validateTransaksi['tgl'] = now();
        $validateTransaksi['batas_waktu'] = Carbon::create(now())->addDays(5);
        $validateTransaksi['pajak'] = 1000;
        $validateTransaksi['user_id'] = auth()->user()->id;

        if ($request->dibayar == 'Telah Bayar') {
            $validateTransaksi['tgl_bayar'] = now();
        }

        $validateDetail = $request->validate([
            'paket_id' => 'required',
            'qty' => 'required',
            'keterangan' => 'required'
        ]);

        $validateDetail['kode_invoice'] = $validateTransaksi['kode_invoice'];

        Transaksi::create($validateTransaksi);
        DetailTransaksi::create($validateDetail);    
        return redirect('/dashboard/transaksis')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        $all_status = ['Baru', 'Proses', 'Selesai', 'Diambil'];

        $harga = $transaksi->detailTransaksi->paket->harga * round($transaksi->detailTransaksi->qty);
        $diskon = $harga * $transaksi->diskon / 100;
        $total = $harga - $diskon + $transaksi->biaya_tambahan + $transaksi->pajak;

        return view('dashboard.transaksi.show', [
            'title' => 'Transaksi ' . $transaksi->member->nama,
            'transaksi' => $transaksi,
            'harga' => $harga,
            'diskon' => round($diskon),
            'total' => round($total),
            'pakets' => Paket::all(),
            'all_status' => $all_status
        ]);
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
        $validateTransaksi = $request->validate([
            'biaya_tambahan' => 'required|max:10',
            'diskon' => 'required|max:2',
        ]);

        if ($request->dibayar == 'Telah bayar') {
            $validateTransaksi['tgl_bayar'] = now();
        }

        $validateDetail = $request->validate([
            'paket_id' => 'required',
            'qty' => 'required',
            'keterangan' => 'required'
        ]);

        Transaksi::where('kode_invoice', $transaksi->kode_invoice)->update($validateTransaksi);
        DetailTransaksi::where('kode_invoice', $transaksi->kode_invoice)->update($validateDetail);    
        return redirect('/dashboard/transaksis/' . $transaksi->kode_invoice)->with('success', 'Transaksi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $this->authorize('delete', $transaksi);

        Transaksi::where('kode_invoice', $transaksi->kode_invoice)->delete();
        DetailTransaksi::where('kode_invoice', $transaksi->kode_invoice)->delete();
        return redirect('/dashboard/transaksis')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function export(Request $request) 
    {
        return Excel::download(new TransaksisExport, 'transaksis.xlsx');
    }
}
