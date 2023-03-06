<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Outlet extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                $query->where('nama', 'like', '%'. $search. '%')
                    ->orWhere('alamat', 'like', '%' . $search . '%');
            });
        });
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'transaksi_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function paket()
    {
        return $this->hasMany(Paket::class, 'paket_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
