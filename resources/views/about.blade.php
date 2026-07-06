@extends('layouts.master')

@section('title', 'About Us')

@section('content')
<section class="relative pt-32 pb-20 flex items-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1633681926033-ef8ebec2e0df?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="About Us" class="w-full h-full object-cover">
        <div class="hero-overlay-light dark:hero-overlay-dark"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
        <p class="font-alt text-rose text-lg tracking-[0.25em] uppercase mb-3 italic">About Us</p>
        <h1 class="text-5xl md:text-7xl font-serif font-bold text-ivory">Our Story</h1>
        <div class="gold-divider mx-auto mt-6"></div>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="hover:scale-[1.01] transition-transform duration-500">
                <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=85" alt="Our Salon" class="rounded-2xl shadow-xl w-full h-[500px] object-cover">
            </div>
            <div class="animate-fade-in-up">
                <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-3 italic">Our Story</p>
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-charcoal dark:text-ivory mb-6">A Decade of Beauty Excellence</h2>
                <div class="gold-divider mb-6"></div>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed mb-4">Founded in 2015, VelvetLuxe was born from a passion for beauty and a desire to create a sanctuary where women could escape, relax, and emerge feeling radiant. What started as a small boutique studio has grown into one of the most prestigious beauty destinations in the city.</p>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed mb-4">Our founder, Isabella Martinez, envisioned a space where every detail — from the ambient lighting to the premium products — would contribute to an unparalleled beauty experience. Today, our team of skilled professionals carries forward that vision with every service we provide.</p>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed">We pride ourselves on using only the finest products, staying ahead of beauty trends, and ensuring every client leaves our salon feeling beautiful, confident, and rejuvenated.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gradient-blush dark:bg-rose-dark/10 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl p-10 shadow-sm">
                <h3 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory mb-4">Our Mission</h3>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed">To empower every woman to feel beautiful and confident through exceptional beauty services delivered with warmth, professionalism, and artistry in a luxurious, relaxing environment.</p>
            </div>
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl p-10 shadow-sm">
                <h3 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory mb-4">Our Vision</h3>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed">To be the premier destination for luxury beauty services, recognized for our commitment to excellence, innovation, and creating transformative experiences that celebrate the unique beauty of every client.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-3 italic">Our Team</p>
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-charcoal dark:text-ivory">Meet Our Experts</h2>
            <div class="gold-divider mx-auto mt-4"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($staff ?? [] as $staff)
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm">
                <div class="h-72 overflow-hidden">
                    <img src="{{ $staff->image ?? 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80' }}" alt="{{ $staff->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-serif font-bold text-charcoal dark:text-ivory">{{ $staff->name }}</h3>
                    <p class="text-rose-dark dark:text-rose text-sm font-medium mb-2">{{ $staff->role }}</p>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm">{{ Str::limit($staff->bio ?? '', 100) }}</p>
                </div>
            </div>
            @empty
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm">
                <div class="h-72 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Isabella Martinez" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-serif font-bold text-charcoal dark:text-ivory">Isabella Martinez</h3>
                    <p class="text-rose-dark dark:text-rose text-sm font-medium mb-2">Founder & Master Stylist</p>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm">With over 15 years of experience, Isabella brings artistic vision and precision to every style.</p>
                </div>
            </div>
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm">
                <div class="h-72 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1594744803329-e58b31de8bf5?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Sophie Laurent" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-serif font-bold text-charcoal dark:text-ivory">Sophie Laurent</h3>
                    <p class="text-rose-dark dark:text-rose text-sm font-medium mb-2">Skincare Specialist</p>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm">Certified aesthetician specializing in advanced facials and rejuvenation treatments.</p>
                </div>
            </div>
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm">
                <div class="h-72 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Amara Okafor" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-serif font-bold text-charcoal dark:text-ivory">Amara Okafor</h3>
                    <p class="text-rose-dark dark:text-rose text-sm font-medium mb-2">Makeup Artist</p>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm">Award-winning makeup artist with expertise in bridal, editorial, and special effects.</p>
                </div>
            </div>
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl overflow-hidden shadow-sm">
                <div class="h-72 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Lily Chen" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-serif font-bold text-charcoal dark:text-ivory">Lily Chen</h3>
                    <p class="text-rose-dark dark:text-rose text-sm font-medium mb-2">Nail Art Specialist</p>
                    <p class="text-charcoal/60 dark:text-ivory/60 text-sm">Creative nail artist known for intricate designs and premium nail care techniques.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
