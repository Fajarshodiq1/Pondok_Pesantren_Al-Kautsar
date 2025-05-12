<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Program extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'thumbnail'
    ];
    
    // slug
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}