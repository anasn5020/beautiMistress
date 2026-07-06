@extends('layouts.master')

@section('title', 'Home')

@section('content')
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1765612374091-7b9f61c80574?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=85" alt="VelvetLuxe Salon" class="w-full h-full object-cover">
        <div class="hero-overlay-light dark:hero-overlay-dark"></div>
    </div>
    <div class="relative z-10 text-center max-w-4xl mx-auto px-4 animate-fade-in-up">
        <p class="font-alt text-rose text-lg tracking-[0.25em] uppercase mb-4 italic drop-shadow-lg">Welcome to Luxury</p>
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold text-ivory mb-6 leading-tight [text-shadow:0_4px_20px_rgba(0,0,0,0.6)]">Where Beauty<br><span class="bg-gradient-to-r from-rose via-gold to-rose bg-clip-text text-transparent">Meets Elegance</span></h1>
        <p class="text-xl text-ivory/90 mb-10 max-w-2xl mx-auto font-light leading-relaxed [text-shadow:0_2px_12px_rgba(0,0,0,0.5)]">Indulge in premium beauty treatments crafted to enhance your natural radiance in an atmosphere of pure sophistication.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('booking') }}" class="btn-primary px-10 py-4 text-white font-medium rounded-full text-lg shadow-xl hover:shadow-rose-dark/30">Book Your Appointment</a>
            <a href="{{ route('services') }}" class="px-10 py-4 text-ivory font-medium rounded-full text-lg border-2 border-ivory/40 hover:border-rose hover:text-rose transition-all duration-500">Explore Services</a>
        </div>
    </div>
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-float">
        <svg class="w-6 h-6 text-ivory/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-3 italic">What We Offer</p>
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-charcoal dark:text-ivory">Featured Services</h2>
            <div class="gold-divider mx-auto mt-4"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredServices ?? [] as $service)
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm">
                <div class="h-56 overflow-hidden">
                    <img src="{{ $service->image ?? 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=85' }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-serif font-bold text-charcoal dark:text-ivory mb-2">{{ $service->name }}</h3>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">{{ Str::limit($service->description ?? 'Luxury beauty treatment tailored to your needs.', 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-rose-dark dark:text-rose font-semibold text-lg">${{ number_format($service->price ?? 0, 2) }}</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 text-sm">{{ $service->duration ?? 60 }} min</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm">
                <div class="h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=85" alt="Hair Styling" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-serif font-bold text-charcoal dark:text-ivory mb-2">Luxury Hair Styling</h3>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">Professional hair styling with premium products for a stunning look.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-rose-dark dark:text-rose font-semibold text-lg">$85.00</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 text-sm">60 min</span>
                    </div>
                </div>
            </div>
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm">
                <div class="h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=85" alt="Facial" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-serif font-bold text-charcoal dark:text-ivory mb-2">Radiance Facial</h3>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">Rejuvenating facial treatment for glowing, youthful skin.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-rose-dark dark:text-rose font-semibold text-lg">$120.00</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 text-sm">75 min</span>
                    </div>
                </div>
            </div>
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm">
                <div class="h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=85" alt="Manicure" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-serif font-bold text-charcoal dark:text-ivory mb-2">Premium Manicure</h3>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm mb-4">Luxurious nail care with elegant designs and premium polish.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-rose-dark dark:text-rose font-semibold text-lg">$55.00</span>
                        <span class="text-charcoal/50 dark:text-ivory/50 text-sm">45 min</span>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-24 bg-gradient-blush dark:bg-rose-dark/10 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-3 italic">Our Story</p>
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-charcoal dark:text-ivory mb-6">A Sanctuary of Beauty & Relaxation</h2>
                <div class="gold-divider mb-6"></div>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed mb-6">At VelvetLuxe, we believe every woman deserves to feel beautiful, confident, and pampered. Our luxury salon offers a curated selection of premium beauty services in an environment designed for relaxation and rejuvenation.</p>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed mb-8">With over a decade of experience, our skilled team of beauty professionals uses only the finest products and techniques to deliver exceptional results that enhance your natural beauty.</p>
                <a href="{{ route('about') }}" class="btn-primary inline-flex items-center space-x-2 px-6 py-3 text-white font-medium rounded-full transition-all duration-300">
                    <span>Learn More About Us</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img src="https://images.unsplash.com/photo-1633681926033-ef8ebec2e0df?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=85" alt="Salon Interior" class="rounded-2xl shadow-lg w-full h-64 object-cover hover:scale-[1.02] transition-transform duration-500">
                <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=85" alt="Beauty Treatment" class="rounded-2xl shadow-lg w-full h-64 object-cover mt-8 hover:scale-[1.02] transition-transform duration-500">
                <img src="https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=85" alt="Spa" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:scale-[1.02] transition-transform duration-500">
                <img src="https://images.unsplash.com/photo-1487412912498-0447578fcca8?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=85" alt="Makeup" class="rounded-2xl shadow-lg w-full h-48 object-cover mt-4 hover:scale-[1.02] transition-transform duration-500">
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500" x-data="{ currentSlide: 0 }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-3 italic">What Our Clients Say</p>
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-charcoal dark:text-ivory">Testimonials</h2>
            <div class="gold-divider mx-auto mt-4"></div>
        </div>
        <div class="relative overflow-hidden">
            <div class="flex transition-transform duration-500 ease-in-out" :style="'transform: translateX(-' + currentSlide * 100 + '%)'">
                @forelse($testimonials ?? [] as $testimonial)
                <div class="w-full flex-shrink-0 px-4">
                    <div class="max-w-2xl mx-auto bg-white dark:bg-charcoal rounded-2xl p-10 shadow-sm">
                        <div class="flex justify-center mb-4">
                            @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-rose-dark dark:text-rose' : 'text-charcoal/20 dark:text-ivory/20' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endfor
                        </div>
                        <p class="text-charcoal/70 dark:text-ivory/70 text-lg italic leading-relaxed mb-6 font-alt">"{{ $testimonial->content }}"</p>
                        <div class="flex items-center justify-center space-x-4">
                            @if($testimonial->image)
                            <img src="{{ $testimonial->image }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full object-cover">
                            @endif
                            <div>
                                <p class="font-semibold text-charcoal dark:text-ivory">{{ $testimonial->client_name }}</p>
                                <p class="text-charcoal/50 dark:text-ivory/50 text-sm">{{ $testimonial->client_title ?? 'Client' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @foreach([
                    ['name' => 'Sarah Johnson', 'title' => 'Regular Client', 'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=85', 'text' => 'Absolutely stunning experience! The team at VelvetLuxe made me feel like royalty. My skin has never looked better.'],
                    ['name' => 'Emily Rodriguez', 'title' => 'Premium Member', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=85', 'text' => 'The best salon in town! Professional, elegant, and the results are always flawless. Highly recommend their facial treatments.'],
                    ['name' => 'Jessica Chen', 'title' => 'VIP Client', 'img' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=85', 'text' => 'Beautiful atmosphere and incredibly talented staff. My go-to place for all my beauty needs. The VIP package is worth every penny!'],
                ] as $review)
                <div class="w-full flex-shrink-0 px-4">
                    <div class="max-w-2xl mx-auto bg-white dark:bg-charcoal rounded-2xl p-10 shadow-sm text-center">
                        <div class="flex justify-center mb-4">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-rose-dark dark:text-rose" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-charcoal/70 dark:text-ivory/70 text-lg italic leading-relaxed mb-6 font-alt">"{{ $review['text'] }}"</p>
                        <div class="flex items-center justify-center space-x-4">
                            <img src="{{ $review['img'] }}" alt="{{ $review['name'] }}" class="w-12 h-12 rounded-full object-cover">
                            <div>
                                <p class="font-semibold text-charcoal dark:text-ivory">{{ $review['name'] }}</p>
                                <p class="text-charcoal/50 dark:text-ivory/50 text-sm">{{ $review['title'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforelse
            </div>
            <button @click="currentSlide = currentSlide > 0 ? currentSlide - 1 : {{ max(count($testimonials ?? []), 3) - 1 }}" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/80 dark:bg-charcoal/80 backdrop-blur-xl shadow-lg flex items-center justify-center hover:bg-rose-light dark:hover:bg-rose-dark/30 transition-all duration-300">
                <svg class="w-5 h-5 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button @click="currentSlide = currentSlide < {{ max(count($testimonials ?? []), 3) - 1 }} ? currentSlide + 1 : 0" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/80 dark:bg-charcoal/80 backdrop-blur-xl shadow-lg flex items-center justify-center hover:bg-rose-light dark:hover:bg-rose-dark/30 transition-all duration-300">
                <svg class="w-5 h-5 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
        <div class="flex justify-center space-x-2 mt-8">
            @forelse($testimonials ?? [] as $key => $testimonial)
            <button @click="currentSlide = {{ $key }}" class="w-2.5 h-2.5 rounded-full transition-all duration-300" :class="currentSlide === {{ $key }} ? 'bg-rose-dark dark:bg-rose w-8' : 'bg-charcoal/30 dark:bg-ivory/30'"></button>
            @empty
            @foreach([0, 1, 2] as $dot)
            <button @click="currentSlide = {{ $dot }}" class="w-2.5 h-2.5 rounded-full transition-all duration-300" :class="currentSlide === {{ $dot }} ? 'bg-rose-dark dark:bg-rose w-8' : 'bg-charcoal/30 dark:bg-ivory/30'"></button>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<section class="py-24 bg-gradient-blush dark:bg-rose-dark/10 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-3 italic">Moments of Beauty</p>
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-charcoal dark:text-ivory">Our Gallery</h2>
            <div class="gold-divider mx-auto mt-4"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse($galleryItems ?? [] as $item)
            <div class="overflow-hidden rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 hover:scale-[1.02]">
                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-64 object-cover hover:scale-110 transition-transform duration-700">
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-charcoal/50 dark:text-ivory/50">
                <p>Gallery coming soon.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('gallery') }}" class="btn-secondary inline-flex items-center space-x-2 px-6 py-3 rounded-full font-medium">
                <span>View Full Gallery</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

<section class="relative py-24 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=85" alt="CTA Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-rose-dark/80 to-charcoal/80 dark:from-black/80 dark:via-rose-dark/60 dark:to-black/80"></div>
    </div>
    <div class="relative z-10 max-w-4xl mx-auto text-center px-4 animate-scale-in">
        <h2 class="text-4xl md:text-5xl font-serif font-bold text-ivory mb-6">Ready to Transform Your Look?</h2>
        <p class="text-xl text-ivory/80 mb-10 max-w-2xl mx-auto font-light">Book your appointment today and experience the luxury you deserve. Our team is ready to pamper you.</p>
        <a href="{{ route('booking') }}" class="btn-primary inline-flex items-center space-x-2 px-8 py-4 text-white font-semibold rounded-full text-lg shadow-xl">Book Your Appointment</a>
    </div>
</section>
@endsection
