@extends('layouts.master')

@section('title', 'Pricing & Packages')

@section('content')
<section class="relative pt-32 pb-20 flex items-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Pricing" class="w-full h-full object-cover">
        <div class="hero-overlay-light dark:hero-overlay-dark"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
        <p class="font-alt text-rose text-lg tracking-[0.25em] uppercase mb-3 italic">Investment in Beauty</p>
        <h1 class="text-5xl md:text-7xl font-serif font-bold text-ivory">Pricing & Packages</h1>
        <div class="gold-divider mx-auto mt-6"></div>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-3 italic">Choose Your Plan</p>
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-charcoal dark:text-ivory">Beauty Packages</h2>
            <div class="gold-divider mx-auto mt-4"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
            @forelse($packages ?? [] as $package)
            <div class="relative bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col">
                @if($package->tier === 'premium' || $package->tier === 'vip')
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-rose-dark text-white px-6 py-1 rounded-full text-sm font-medium">Most Popular</div>
                @endif
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory mb-2">{{ $package->name }}</h3>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">{{ $package->description }}</p>
                    <div class="flex items-baseline justify-center">
                        <span class="text-4xl font-bold text-rose-dark dark:text-rose">${{ number_format($package->price ?? 0, 2) }}</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 ml-2">/ package</span>
                    </div>
                </div>
                <ul class="space-y-3 mb-8 flex-1">
                    @foreach(($package->features ?? []) as $feature)
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('booking') }}" class="w-full py-3 text-center rounded-full font-medium transition-all duration-300 {{ $package->tier === 'premium' || $package->tier === 'vip' ? 'bg-rose-dark text-white hover:bg-rose-dark/90 shadow-lg' : 'border-2 border-rose-dark/30 dark:border-rose/30 text-charcoal dark:text-ivory hover:border-rose-dark dark:hover:border-rose' }}">Get Started</a>
            </div>
            @empty
            <div class="relative bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory mb-2">Basic</h3>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">Perfect for essential beauty needs</p>
                    <div class="flex items-baseline justify-center">
                        <span class="text-4xl font-bold text-rose-dark dark:text-rose">$149</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 ml-2">/ package</span>
                    </div>
                </div>
                <ul class="space-y-3 mb-8 flex-1">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">1 Hair Styling Session</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">1 Basic Facial</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">1 Manicure</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">10% Off Additional Services</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">Free Consultation</span>
                    </li>
                </ul>
                <a href="{{ route('booking') }}" class="w-full py-3 text-center border-2 border-rose-dark/30 dark:border-rose/30 text-charcoal dark:text-ivory hover:border-rose-dark dark:hover:border-rose rounded-full font-medium transition-all duration-300">Get Started</a>
            </div>
            <div class="relative bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col border-2 border-rose-dark/30 dark:border-rose/30 scale-105">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-rose-dark text-white px-6 py-1 rounded-full text-sm font-medium">Most Popular</div>
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory mb-2">Premium</h3>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">Our most popular beauty package</p>
                    <div class="flex items-baseline justify-center">
                        <span class="text-4xl font-bold text-rose-dark dark:text-rose">$299</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 ml-2">/ package</span>
                    </div>
                </div>
                <ul class="space-y-3 mb-8 flex-1">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">2 Hair Styling Sessions</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">2 Premium Facials</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">1 Manicure & 1 Pedicure</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">1 Aromatherapy Massage</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">20% Off Additional Services</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">Priority Booking</span>
                    </li>
                </ul>
                <a href="{{ route('booking') }}" class="w-full py-3 text-center bg-rose-dark text-white hover:bg-rose-dark/90 shadow-lg rounded-full font-medium transition-all duration-300">Get Started</a>
            </div>
            <div class="relative bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory mb-2">VIP</h3>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">The ultimate luxury experience</p>
                    <div class="flex items-baseline justify-center">
                        <span class="text-4xl font-bold text-rose-dark dark:text-rose">$549</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 ml-2">/ package</span>
                    </div>
                </div>
                <ul class="space-y-3 mb-8 flex-1">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">4 Hair Styling Sessions</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">4 Premium Facials</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">2 Manicure & 2 Pedicure</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">3 Spa Treatments</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">35% Off Additional Services</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">VIP Priority Booking</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-charcoal/70 dark:text-ivory/70 text-sm">Free Premium Products</span>
                    </li>
                </ul>
                <a href="{{ route('booking') }}" class="w-full py-3 text-center border-2 border-rose-dark/30 dark:border-rose/30 text-charcoal dark:text-ivory hover:border-rose-dark dark:hover:border-rose rounded-full font-medium transition-all duration-300">Get Started</a>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
