<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksisExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('dashboard.transaksi.export', [
            'transaksis' => Transaksi::all()
        ]);
    }
}
