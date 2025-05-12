<?php

namespace App\Http\Controllers\gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        // Mengambil semua kategori
        $categories = GalleryCategory::all();
        
        // Mengambil semua gallery dengan relasi kategori
        $galleries = Gallery::with('category')->get();
        
        return view('front.gallery.index', compact('categories', 'galleries'));
    }
}