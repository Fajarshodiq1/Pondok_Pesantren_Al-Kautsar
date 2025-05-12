<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\BeritaCategory;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index(Request $request)
    {
        // Get active categories
        $categories = BeritaCategory::where('is_active', true)
            ->withCount('berita')
            ->orderBy('nama')
            ->get();
        
        // Get berita with filters
        $beritaQuery = Berita::with('category')
            ->where('status', 'published')
            ->where('tanggal_publikasi', '<=', now());
            
        // Filter by category if provided
        if ($request->has('category') && $request->category !== 'semua') {
            $category = BeritaCategory::where('slug', $request->category)->first();
            if ($category) {
                $beritaQuery->where('berita_category_id', $category->id);
            }
        }
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $beritaQuery->where(function($query) use ($searchTerm) {
                $query->where('judul', 'like', "%{$searchTerm}%")
                    ->orWhere('konten', 'like', "%{$searchTerm}%");
            });
        }

        // Sorting berita
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'popular':
                    $beritaQuery->orderByDesc('views_count');
                    break;
                case 'oldest':
                    $beritaQuery->orderBy('tanggal_publikasi', 'asc');
                    break;
                default:
                    $beritaQuery->orderBy('tanggal_publikasi', 'desc'); // default: terbaru
            }
        } else {
            $beritaQuery->orderBy('tanggal_publikasi', 'desc'); // default
        }
        
        // Get main headline
        $headline = Berita::with('category')
            ->where('status', 'published')
            ->where('is_featured', true)
            ->where('tanggal_publikasi', '<=', now())
            ->orderBy('tanggal_publikasi', 'desc')
            ->first();
            
        // Get featured berita (for secondary headlines)
        $featuredBerita = Berita::with('category')
            ->where('status', 'published')
            ->where('is_featured', true)
            ->where('tanggal_publikasi', '<=', now())
            ->when($headline, function($query) use ($headline) {
                return $query->where('id', '!=', $headline->id);
            })
            ->orderBy('tanggal_publikasi', 'desc')
            ->limit(2)
            ->get();
            
        // Get popular berita for sidebar
        $popularBerita = Berita::with('category')
            ->where('status', 'published')
            ->where('tanggal_publikasi', '<=', now())
            ->orderBy('views_count', 'desc')
            ->limit(5)
            ->get();
            
        // Get paginated berita
        $beritas = $beritaQuery
            ->paginate(10)
            ->withQueryString(); // keep query string (category/search/sort)
            
        return view('front.berita.index', compact(
            'beritas', 
            'categories', 
            'headline', 
            'featuredBerita',
            'popularBerita'
        ));
    }


    /**
     * Display the specified news article.
     */
    public function show($slug)
    {
        // Find the berita by slug
        $berita = Berita::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->where('tanggal_publikasi', '<=', now())
            ->firstOrFail();
            
        // Increment view count
        $berita->increment('views_count');
        
        // Get categories for sidebar
        $categories = BeritaCategory::where('is_active', true)
            ->withCount('berita')
            ->orderBy('nama')
            ->get();
            
        // Get related berita
        $relatedBerita = Berita::with('category')
            ->where('status', 'published')
            ->where('tanggal_publikasi', '<=', now())
            ->where('id', '!=', $berita->id)
            ->where(function($query) use ($berita) {
                $query->where('berita_category_id', $berita->berita_category_id)
                      ->orWhere(function($query) use ($berita) {
                          // Extract keywords from title
                          $keywords = explode(' ', $berita->judul);
                          foreach ($keywords as $keyword) {
                              if (strlen($keyword) > 3) {
                                  $query->orWhere('judul', 'like', "%{$keyword}%");
                              }
                          }
                      });
            })
            ->orderBy('tanggal_publikasi', 'desc')
            ->limit(4)
            ->get();
            
        // Get popular berita for sidebar
        $popularBerita = Berita::with('category')
            ->where('status', 'published')
            ->where('tanggal_publikasi', '<=', now())
            ->where('id', '!=', $berita->id)
            ->orderBy('views_count', 'desc')
            ->limit(5)
            ->get();
            
        return view('front.berita.show', compact(
            'berita', 
            'categories', 
            'relatedBerita',
            'popularBerita'
        ));
    }
}