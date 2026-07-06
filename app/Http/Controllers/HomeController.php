<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::where('is_active', true)->take(6)->get();
        $testimonials = Testimonial::where('is_approved', true)->take(5)->get();
        $galleryItems = Gallery::where('is_active', true)->orderBy('sort_order')->take(8)->get();

        return view('home', compact('featuredServices', 'testimonials', 'galleryItems'));
    }
}
