<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['transaksi', 'paket'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'kode_invoice');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function getRouteKeyName()
    {
        return 'kode_invoice';
    }
}
