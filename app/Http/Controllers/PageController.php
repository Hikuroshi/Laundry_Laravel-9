<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;

class PageController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Home'
        ]);
    }

    public function dashboard(Transaksi $transaksi)
    {
        // $harga = $transaksi->detailTransaksi->paket->harga * round($transaksi->detailTransaksi->qty);
        // $diskon = $harga * $transaksi->diskon / 100;
        // $total = $harga - $diskon + $transaksi->biaya_tambahan + $transaksi->pajak;

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'transaksis_count' => Transaksi::all()->count(),
            'members_count' => Member::all()->count(),
            'outlets_count' => Outlet::all()->count(),
            'pakets_count' => Paket::all()->count(),
            'users_count' => User::all()->count(),
            'transaksis' => Transaksi::latest(3)->get(),
            'total' => $transaksi->detailTransaksi
        ]);
    }

    public function test()
    {
        return Transaksi::find(8)->detailTransaksi->keterangan;
    }
}
