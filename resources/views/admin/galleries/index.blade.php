@extends('layouts.master')

@section('title', 'Gallery Management')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-1 italic">Admin</p>
                <h1 class="text-4xl font-serif font-bold text-charcoal dark:text-ivory">Gallery</h1>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.galleries.create') }}" class="px-6 py-3 btn-primary text-white font-medium rounded-full">Add Image</a>
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                    <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            @include('admin.partials.sidebar')
            <div class="flex-1">

        @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl text-green-800 dark:text-green-300">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleryItems ?? [] as $item)
            <div class="bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm group">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-4">
                    <h3 class="font-serif font-bold text-charcoal dark:text-ivory">{{ $item->title }}</h3>
                    <p class="text-charcoal/50 dark:text-ivory/50 text-xs mt-1">{{ $item->category }}</p>
                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-rose/10 dark:border-rose-dark/10">
                        <span class="px-2 py-0.5 text-xs rounded-full {{ $item->is_active ? 'bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-300' : 'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-300' }}">
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.galleries.edit', $item) }}" class="text-rose-dark dark:text-rose hover:underline text-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.galleries.destroy', $item) }}" class="inline" onsubmit="return confirm('Delete this image?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16 text-charcoal/50 dark:text-ivory/50">
                <p class="text-lg">No gallery images yet.</p>
                <a href="{{ route('admin.galleries.create') }}" class="text-rose-dark dark:text-rose hover:underline mt-2 inline-block">Add your first image</a>
            </div>
            @endforelse
        </div>
            </div>
        </div>
    </div>
</section>
@endsection
