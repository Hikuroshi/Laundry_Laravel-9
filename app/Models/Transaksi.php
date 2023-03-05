<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user', 'member', 'outlet'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailTransaksi()
    {
        return $this->hasOne(DetailTransaksi::class, 'kode_invoice', 'kode_invoice');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    public function getRouteKeyName()
    {
        return 'kode_invoice';
    }
}
