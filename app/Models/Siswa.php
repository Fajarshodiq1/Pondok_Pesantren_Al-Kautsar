<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'riwayat_pendidikan',
        // data orang tua
        'nama_ayah',
        'pekerjaan_ayah',
        'no_telepon_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'no_telepon_ibu',
        // dokumen pendaftaran
        'akta_lahir',
        'kk',
        'ijazah',
        'sekolah_asal',
        'pas_foto',
        'status',
        'email',
        'password',
        // relasi dengan program
        'program_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}