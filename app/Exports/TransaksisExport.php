<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransaksisExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.transaksi.export_transaksis', [
            'transaksis' => Transaksi::all()
        ]);
    }
}
