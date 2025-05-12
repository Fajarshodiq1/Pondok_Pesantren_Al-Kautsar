<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';
    
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'berita_category_id',
        'tanggal_publikasi',
        'status',
        'is_featured',
        'views_count',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'datetime',
        'is_featured' => 'boolean',
        'status' => 'string',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BeritaCategory::class, 'berita_category_id');
    }
}