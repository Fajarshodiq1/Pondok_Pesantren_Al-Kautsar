<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'siswa_id',
        'testimonial',
        'detail_alumni'
    ];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}