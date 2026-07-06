<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_approved', true)->get();

        return view('testimonials', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => ['required'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'content' => ['required', 'string'],
        ]);

        Testimonial::create([
            'client_name' => $validated['client_name'],
            'rating' => $validated['rating'],
            'content' => $validated['content'],
            'is_approved' => false,
        ]);

        return redirect()->back()->with('success', 'Testimonial submitted for approval!');
    }
}
