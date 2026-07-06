<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleryItems = Gallery::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('gallery', compact('galleryItems'));
    }
}
