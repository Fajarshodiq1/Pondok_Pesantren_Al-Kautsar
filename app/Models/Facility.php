<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'title',
        'facility_category_id',
        'description',
        'image',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(FacilityCategory::class,'facility_category_id');
    }
}