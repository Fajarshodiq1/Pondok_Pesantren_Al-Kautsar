<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\BeritaCategory;
use App\Models\Facility;
use App\Models\FacilityCategory;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Program;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;

class FrontController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        $facilityCategories = FacilityCategory::all();
        $facilities = Facility::all();
        $galleryCategories = GalleryCategory::all();
        $galleries = Gallery::all();
        $testimonials = Testimonial::all();
        return view('front.index', compact('programs', 'facilityCategories', 'facilities', 'galleryCategories', 'galleries', 'testimonials'));
    }
    // public function program()
    // {
    //     $programs = Program::all();
    //     return view('front.program.program', compact('programs'));
    // }
    public function berita()
    {
        $beritaCategories = BeritaCategory::all();
        $berita = Berita::all();
        return view('front.berita.index', compact('beritaCategories', 'berita'));
    }
    public function profile()
    {
        return view('front.profile');
    }
    public function kontak()
    {
        return view('front.kontak');
    }
    public function timeline()
    {
        return view('timeline-pendaftaran');
    }
    // public function detailProgram($slug)
    // {
    //     $program = Program::where('slug', $slug)->firstOrFail();

    //     $relatedPrograms = Program::where('id', '!=', $program->id)
    //                             ->latest()
    //                             ->take(3)
    //                             ->get();
    
    //     return view('front.program.detail', compact('program', 'relatedPrograms'));
    // }
}