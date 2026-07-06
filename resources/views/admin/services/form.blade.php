@extends('layouts.master')

@section('title', isset($service) ? 'Edit Service' : 'Add Service')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory">{{ isset($service) ? 'Edit Service' : 'Add New Service' }}</h1>
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            @include('admin.partials.sidebar')
            <div class="flex-1 max-w-3xl">
        <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm space-y-6">
            @csrf
            @if(isset($service)) @method('PUT') @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $service->name ?? '') }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                    @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Category</label>
                    <select name="category" id="category" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                        <option value="Hair" {{ old('category', $service->category ?? '') == 'Hair' ? 'selected' : '' }}>Hair</option>
                        <option value="Skin" {{ old('category', $service->category ?? '') == 'Skin' ? 'selected' : '' }}>Skin</option>
                        <option value="Makeup" {{ old('category', $service->category ?? '') == 'Makeup' ? 'selected' : '' }}>Makeup</option>
                        <option value="Nails" {{ old('category', $service->category ?? '') == 'Nails' ? 'selected' : '' }}>Nails</option>
                        <option value="Spa" {{ old('category', $service->category ?? '') == 'Spa' ? 'selected' : '' }}>Spa</option>
                        <option value="Waxing" {{ old('category', $service->category ?? '') == 'Waxing' ? 'selected' : '' }}>Waxing</option>
                        <option value="Body" {{ old('category', $service->category ?? '') == 'Body' ? 'selected' : '' }}>Body</option>
                    </select>
                    @error('category')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="duration" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Duration (minutes)</label>
                    <input type="number" name="duration" id="duration" value="{{ old('duration', $service->duration ?? 60) }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                    @error('duration')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Price ($)</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $service->price ?? '') }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                    @error('price')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">{{ old('description', $service->description ?? '') }}</textarea>
                @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Image</label>
                <input type="url" name="image" id="image" value="{{ old('image', $service->image ?? '') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-rose/30 text-rose-dark focus:ring-rose-dark">
                <label for="is_active" class="text-sm font-medium text-charcoal dark:text-ivory">Active</label>
            </div>
            <div class="flex items-center space-x-4 pt-4">
                <button type="submit" class="px-8 py-3 btn-primary text-white font-medium rounded-full">{{ isset($service) ? 'Update Service' : 'Create Service' }}</button>
                <a href="{{ route('admin.services.index') }}" class="px-8 py-3 btn-secondary text-charcoal dark:text-ivory rounded-full">Cancel</a>
            </div>
            </form>
        </div>
        </div>
    </div>
</section>
@endsection
