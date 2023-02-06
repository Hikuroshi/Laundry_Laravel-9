<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Paket extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function detailTransaksi()
    {
        return $this->hasOne(DetailTransaksi::class, 'detail_transaksi_id');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_paket'
            ]
        ];
    }
}
