<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BeritaCategory extends Model
{
    use HasFactory;

    protected $table = 'berita_categories';
    
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'warna', // untuk menampilkan warna kategori di frontend
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function berita(): HasMany
    {
        return $this->hasMany(Berita::class, 'berita_category_id');
    }
}