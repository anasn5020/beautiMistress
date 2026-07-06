@extends('layouts.master')

@section('title', isset($staffMember) ? 'Edit Staff' : 'Add Staff')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory">{{ isset($staffMember) ? 'Edit Staff' : 'Add New Staff' }}</h1>
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            @include('admin.partials.sidebar')
            <div class="flex-1">
        <form action="{{ isset($staffMember) ? route('admin.staff.update', $staffMember) : route('admin.staff.store') }}" method="POST" class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm space-y-6">
            @csrf
            @if(isset($staffMember)) @method('PUT') @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $staffMember->name ?? '') }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                    @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $staffMember->email ?? '') }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                    @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Phone</label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone', $staffMember->phone ?? '') }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                    @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Role</label>
                    <select name="role" id="role" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                        <option value="Master Stylist" {{ old('role', $staffMember->role ?? '') == 'Master Stylist' ? 'selected' : '' }}>Master Stylist</option>
                        <option value="Skincare Specialist" {{ old('role', $staffMember->role ?? '') == 'Skincare Specialist' ? 'selected' : '' }}>Skincare Specialist</option>
                        <option value="Makeup Artist" {{ old('role', $staffMember->role ?? '') == 'Makeup Artist' ? 'selected' : '' }}>Makeup Artist</option>
                        <option value="Nail Art Specialist" {{ old('role', $staffMember->role ?? '') == 'Nail Art Specialist' ? 'selected' : '' }}>Nail Art Specialist</option>
                        <option value="Spa Therapist" {{ old('role', $staffMember->role ?? '') == 'Spa Therapist' ? 'selected' : '' }}>Spa Therapist</option>
                        <option value="Waxing Specialist" {{ old('role', $staffMember->role ?? '') == 'Waxing Specialist' ? 'selected' : '' }}>Waxing Specialist</option>
                        <option value="Body Treatment Specialist" {{ old('role', $staffMember->role ?? '') == 'Body Treatment Specialist' ? 'selected' : '' }}>Body Treatment Specialist</option>
                    </select>
                    @error('role')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label for="bio" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Bio</label>
                <textarea name="bio" id="bio" rows="4" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">{{ old('bio', $staffMember->bio ?? '') }}</textarea>
                @error('bio')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Image</label>
                <input type="url" name="image" id="image" value="{{ old('image', $staffMember->image ?? '') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $staffMember->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-rose/30 text-rose-dark focus:ring-rose-dark">
                <label for="is_active" class="text-sm font-medium text-charcoal dark:text-ivory">Active</label>
            </div>
            <div class="flex items-center space-x-4 pt-4">
                <button type="submit" class="px-8 py-3 btn-primary text-white font-medium rounded-full">{{ isset($staffMember) ? 'Update Staff' : 'Create Staff' }}</button>
                <a href="{{ route('admin.staff.index') }}" class="px-8 py-3 btn-secondary text-charcoal dark:text-ivory rounded-full">Cancel</a>
            </div>
        </form>
            </div>
        </div>
    </div>
</section>
@endsection
