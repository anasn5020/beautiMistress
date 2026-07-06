@extends('layouts.master')

@section('title', 'Our Services')

@section('content')
<section class="relative pt-32 pb-20 flex items-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Services" class="w-full h-full object-cover">
        <div class="hero-overlay-light dark:hero-overlay-dark"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
        <p class="text-rose text-sm tracking-[0.2em] uppercase mb-3 font-medium">What We Offer</p>
        <h1 class="text-5xl md:text-7xl font-serif font-bold text-ivory">Our Services</h1>
        <div class="gold-divider mx-auto mt-6"></div>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500" x-data="{ activeTab: 'All' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $categories = ($services ?? collect())->pluck('category')->unique()->sort()->values()->prepend('All');
            $grouped = ($services ?? collect())->groupBy('category');
        @endphp
        <div class="flex flex-wrap justify-center gap-3 mb-16">
            @foreach($categories as $cat)
            <button @click="activeTab = '{{ $cat }}'" class="px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300" :class="activeTab === '{{ $cat }}' ? 'bg-rose-dark text-white shadow-lg' : 'bg-white dark:bg-charcoal text-charcoal dark:text-ivory border border-rose/20 dark:border-rose-dark/20 hover:border-rose-dark dark:hover:border-rose'">{{ $cat === 'All' ? 'All Services' : $cat }}</button>
            @endforeach
        </div>

@foreach($categories as $category)
<div x-show="activeTab === '{{ $category }}'" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
    @if($category === 'All')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($services ?? [] as $service)
        <div class="bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group">
            <div class="h-56 overflow-hidden">
                <img src="{{ $service->image ?? 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80' }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            </div>
            <div class="p-6">
                <span class="text-xs text-rose-dark dark:text-rose font-medium uppercase tracking-wider">{{ $service->category }}</span>
                <h3 class="text-xl font-serif font-bold text-charcoal dark:text-ivory mt-1 mb-2">{{ $service->name }}</h3>
                <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">{{ Str::limit($service->description ?? '', 100) }}</p>
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-rose-dark dark:text-rose font-semibold text-lg">${{ number_format($service->price ?? 0, 2) }}</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 text-sm ml-2">/ {{ $service->duration ?? 60 }} min</span>
                    </div>
                    <a href="{{ route('booking') }}" class="px-4 py-2 bg-rose-dark/10 hover:bg-rose-dark text-rose-dark hover:text-white dark:text-rose dark:hover:text-white rounded-full text-sm font-medium transition-all duration-300">Book Now</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-16">
            <p class="text-charcoal/50 dark:text-ivory/50 text-lg">No services found.</p>
        </div>
        @endforelse
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse(($grouped->get($category) ?? collect()) as $service)
        <div class="bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group">
            <div class="h-56 overflow-hidden">
                <img src="{{ $service->image ?? 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80' }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            </div>
            <div class="p-6">
                <span class="text-xs text-rose-dark dark:text-rose font-medium uppercase tracking-wider">{{ $service->category }}</span>
                <h3 class="text-xl font-serif font-bold text-charcoal dark:text-ivory mt-1 mb-2">{{ $service->name }}</h3>
                <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">{{ Str::limit($service->description ?? '', 100) }}</p>
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-rose-dark dark:text-rose font-semibold text-lg">${{ number_format($service->price ?? 0, 2) }}</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 text-sm ml-2">/ {{ $service->duration ?? 60 }} min</span>
                    </div>
                    <a href="{{ route('booking') }}" class="px-4 py-2 bg-rose-dark/10 hover:bg-rose-dark text-rose-dark hover:text-white dark:text-rose dark:hover:text-white rounded-full text-sm font-medium transition-all duration-300">Book Now</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-16">
            <p class="text-charcoal/50 dark:text-ivory/50 text-lg">No services found in this category.</p>
        </div>
        @endforelse
    </div>
    @endif
</div>
@endforeach
    </div>
</section>
@endsection
