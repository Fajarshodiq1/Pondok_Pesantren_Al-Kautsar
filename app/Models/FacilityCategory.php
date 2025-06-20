<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    // slug
    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}