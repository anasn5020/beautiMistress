@extends('layouts.master')

@section('title', 'Gallery')

@section('content')
<section class="relative pt-32 pb-20 flex items-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Gallery" class="w-full h-full object-cover">
        <div class="hero-overlay-light dark:hero-overlay-dark"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
        <p class="font-alt text-rose text-lg tracking-[0.25em] uppercase mb-3 italic">Our Work</p>
        <h1 class="text-5xl md:text-7xl font-serif font-bold text-ivory">Gallery</h1>
        <div class="gold-divider mx-auto mt-6"></div>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500" x-data="{ activeFilter: 'All', selectedImage: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php $categories = ($galleryItems ?? collect())->pluck('category')->unique()->sort()->values(); @endphp
        <div class="flex flex-wrap justify-center gap-3 mb-16">
            <button @click="activeFilter = 'All'" class="px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300" :class="activeFilter === 'All' ? 'bg-rose-dark text-white shadow-lg' : 'bg-white dark:bg-charcoal text-charcoal dark:text-ivory border border-rose/20 dark:border-rose-dark/20 hover:border-rose-dark dark:hover:border-rose'">All</button>
            @foreach($categories as $category)
            <button @click="activeFilter = '{{ $category }}'" class="px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300" :class="activeFilter === '{{ $category }}' ? 'bg-rose-dark text-white shadow-lg' : 'bg-white dark:bg-charcoal text-charcoal dark:text-ivory border border-rose/20 dark:border-rose-dark/20 hover:border-rose-dark dark:hover:border-rose'">{{ $category === 'BeforeAfter' ? 'Before & After' : $category }}</button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($galleryItems ?? [] as $item)
            <div x-show="activeFilter === 'All' || activeFilter === '{{ $item->category }}'" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100" class="group relative overflow-hidden rounded-2xl cursor-pointer" @click="selectedImage = '{{ $item->image }}'">
                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-charcoal/0 group-hover:bg-charcoal/50 transition-all duration-300 flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center">
                        <h3 class="text-ivory font-semibold text-lg">{{ $item->title }}</h3>
                        <p class="text-rose text-sm">{{ $item->category === 'BeforeAfter' ? 'Before & After' : $item->category }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16 text-charcoal/50 dark:text-ivory/50">
                <p class="text-lg">No gallery images yet.</p>
            </div>
            @endforelse
        </div>
    </div>

    <div x-show="selectedImage" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 p-4" @click="selectedImage = null">
        <div class="max-w-5xl w-full relative" @click.stop>
            <button @click="selectedImage = null" class="absolute -top-12 right-0 text-ivory hover:text-rose transition-colors duration-200">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <img :src="selectedImage" alt="Gallery Image" class="w-full max-h-[85vh] object-contain rounded-2xl">
        </div>
    </div>
</section>
@endsection
