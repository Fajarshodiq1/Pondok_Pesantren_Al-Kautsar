<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'jenis_pembayaran_id',
        'bulan',
        'tahun',
        'nominal',
        'status',
        'bukti_pembayaran',
        'keterangan',
        'tanggal_pembayaran',
        'tanggal_approval',
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'datetime',
        'tanggal_approval' => 'datetime',
    ];

    /**
     * Get the siswa that owns the pembayaran.
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Get the jenis pembayaran that owns the pembayaran.
     */
    public function jenisPembayaran()
    {
        return $this->belongsTo(Jenis_pembayaran::class);
    }

    /**
     * Get nama bulan dari integer bulan
     */
    public function getNamaBulanAttribute()
    {
        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return $namaBulan[$this->bulan] ?? 'Unknown';
    }
}