<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransaksiExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.transaksi.export', [
            'transaksis' => Transaksi::all()
        ]);
    }

    // public function headings(): array
    // {
    //     return [
    //         'No',
    //         'User',
    //         'Date',
    //     ];
    // }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Transaksi::all();
    // }
}
