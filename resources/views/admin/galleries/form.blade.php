@extends('layouts.master')

@section('title', isset($gallery) ? 'Edit Image' : 'Add Image')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-1 italic">Admin</p>
                <h1 class="text-4xl font-serif font-bold text-charcoal dark:text-ivory">{{ isset($gallery) ? 'Edit Image' : 'Add Gallery Image' }}</h1>
            </div>
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            @include('admin.partials.sidebar')
            <div class="flex-1">

        <form method="POST" action="{{ isset($gallery) ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}" class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm space-y-6">
            @csrf
            @if(isset($gallery)) @method('PUT') @endif

            <div>
                <label for="title" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $gallery->title ?? '') }}" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Category</label>
                <select name="category" id="category" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                    <option value="Interior" {{ old('category', $gallery->category ?? '') == 'Interior' ? 'selected' : '' }}>Interior</option>
                    <option value="BeforeAfter" {{ old('category', $gallery->category ?? '') == 'BeforeAfter' ? 'selected' : '' }}>Before & After</option>
                    <option value="Events" {{ old('category', $gallery->category ?? '') == 'Events' ? 'selected' : '' }}>Events</option>
                </select>
                @error('category')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Image</label>
                <input type="url" name="image" id="image" value="{{ old('image', $gallery->image ?? '') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                @if(isset($gallery) && $gallery->image)
                <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" class="mt-3 w-32 h-32 object-cover rounded-xl">
                @endif
            </div>

            <div>
                <label for="sort_order" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $gallery->sort_order ?? 0) }}" min="0" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
            </div>

            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $gallery->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-rose/30 text-rose-dark focus:ring-rose-dark">
                <label for="is_active" class="text-sm font-medium text-charcoal dark:text-ivory">Active</label>
            </div>

            <div class="flex items-center space-x-4 pt-4">
                <button type="submit" class="px-6 py-3 btn-primary text-white font-medium rounded-full">{{ isset($gallery) ? 'Update Image' : 'Add Image' }}</button>
                <a href="{{ route('admin.galleries.index') }}" class="px-6 py-3 btn-secondary text-charcoal dark:text-ivory font-medium rounded-full">Cancel</a>
            </div>
        </form>
            </div>
        </div>
    </div>
</section>
@endsection
