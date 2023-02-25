<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Home'
        ]);
    }

    public function dashboard()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function test()
    {
        return Transaksi::find(8)->detailTransaksi->keterangan;
    }
}
