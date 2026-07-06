@extends('layouts.master')

@section('title', 'Testimonials')

@section('content')
<section class="relative pt-32 pb-20 flex items-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1487412912498-0447578fcca8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Testimonials" class="w-full h-full object-cover">
        <div class="hero-overlay-light dark:hero-overlay-dark"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
        <p class="font-alt text-rose text-lg tracking-[0.25em] uppercase mb-3 italic">Client Reviews</p>
        <h1 class="text-5xl md:text-7xl font-serif font-bold text-ivory">Testimonials</h1>
        <div class="gold-divider mx-auto mt-6"></div>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-charcoal dark:text-ivory">What Our Clients Say</h2>
            <div class="gold-divider mx-auto mt-4"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($testimonials ?? [] as $testimonial)
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                <div class="flex mb-4">
                    @for($i = 1; $i <= 5; $i++)
                    <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-rose-dark dark:text-rose' : 'text-charcoal/20 dark:text-ivory/20' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed mb-6">"{{ $testimonial->content }}"</p>
                <div class="flex items-center space-x-3">
                    @if($testimonial->image)
                    <img src="{{ $testimonial->image }}" alt="{{ $testimonial->client_name }}" class="w-10 h-10 rounded-full object-cover">
                    @endif
                    <div>
                        <p class="font-semibold text-charcoal dark:text-ivory text-sm">{{ $testimonial->client_name }}</p>
                        <p class="text-charcoal/50 dark:text-ivory/50 text-xs">{{ $testimonial->client_title ?? 'Client' }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-rose-dark dark:text-rose" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-rose-dark dark:text-rose" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-rose-dark dark:text-rose" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-rose-dark dark:text-rose" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-rose-dark dark:text-rose" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed mb-6">"Absolutely stunning experience! The team at VelvetLuxe made me feel like royalty. My skin has never looked better."</p>
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Sarah Johnson" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-charcoal dark:text-ivory text-sm">Sarah Johnson</p>
                        <p class="text-charcoal/50 dark:text-ivory/50 text-xs">Regular Client</p>
                    </div>
                </div>
            </div>
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                <div class="flex mb-4">
                    @for($i = 0; $i < 4; $i++)
                    <svg class="w-5 h-5 text-rose-dark dark:text-rose" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                    <svg class="w-5 h-5 text-charcoal/20 dark:text-ivory/20" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed mb-6">"The best salon in town! Professional, elegant, and the results are always flawless. Highly recommend their facial treatments."</p>
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Emily Rodriguez" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-charcoal dark:text-ivory text-sm">Emily Rodriguez</p>
                        <p class="text-charcoal/50 dark:text-ivory/50 text-xs">Premium Member</p>
                    </div>
                </div>
            </div>
            <div class="card-hover bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                <div class="flex mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-rose-dark dark:text-rose" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-charcoal/70 dark:text-ivory/70 leading-relaxed mb-6">"Beautiful atmosphere and incredibly talented staff. My go-to place for all my beauty needs. The VIP package is worth every penny!"</p>
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Jessica Chen" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-charcoal dark:text-ivory text-sm">Jessica Chen</p>
                        <p class="text-charcoal/50 dark:text-ivory/50 text-xs">VIP Client</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

@auth
<section class="py-24 bg-gradient-blush dark:bg-rose-dark/10 transition-colors duration-500">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-charcoal dark:text-ivory">Leave a Review</h2>
            <div class="w-20 h-0.5 bg-rose-dark dark:bg-rose mx-auto mt-4"></div>
        </div>
        <form action="{{ route('testimonials.store') }}" method="POST" class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm" x-data="{ rating: 5 }">
            @csrf
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Rating</label>
                    <div class="flex space-x-2">
                        <template x-for="star in [1,2,3,4,5]" :key="star">
                            <button type="button" @click="rating = star" class="focus:outline-none">
                                <svg class="w-8 h-8 transition-colors duration-200" :class="star <= rating ? 'text-rose-dark dark:text-rose' : 'text-charcoal/20 dark:text-ivory/20'" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>
                        </template>
                    </div>
                    <input type="hidden" name="rating" :value="rating">
                    @error('rating')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Your Review</label>
                    <textarea name="content" id="content" rows="4" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200" placeholder="Share your experience...">{{ old('content') }}</textarea>
                    @error('content')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="text-right">
                    <button type="submit" class="px-8 py-3 btn-primary text-white font-medium rounded-full">Submit Review</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endauth
@endsection
