<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nominal',
        'deskripsi',
        'status',
    ];

    /**
     * Get the pembayaran for this jenis pembayaran.
     */
    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }
}