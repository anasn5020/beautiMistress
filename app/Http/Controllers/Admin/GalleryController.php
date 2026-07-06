<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleryItems = Gallery::orderBy('sort_order')->latest()->get();

        return view('admin.galleries.index', compact('galleryItems'));
    }

    public function create(): View
    {
        return view('admin.galleries.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['required', 'string', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        Gallery::create($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery image added successfully.');
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.galleries.form', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery image updated successfully.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery image deleted successfully.');
    }
}
