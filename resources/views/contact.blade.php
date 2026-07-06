@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')
<section class="relative pt-32 pb-20 flex items-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Contact" class="w-full h-full object-cover">
        <div class="hero-overlay-light dark:hero-overlay-dark"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
        <p class="font-alt text-rose text-lg tracking-[0.25em] uppercase mb-3 italic">Get in Touch</p>
        <h1 class="text-5xl md:text-7xl font-serif font-bold text-ivory">Contact Us</h1>
        <div class="gold-divider mx-auto mt-6"></div>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="max-w-2xl mx-auto mb-8 p-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-2xl text-center">
            <p class="text-green-800 dark:text-green-300 font-medium">{{ session('success') }}</p>
        </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-3 italic">Send a Message</p>
                <h2 class="text-4xl font-serif font-bold text-charcoal dark:text-ivory mb-8">We'd Love to Hear From You</h2>
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name ?? '') }}" placeholder="Your Name" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                            @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email ?? '') }}" placeholder="Your Email" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                            @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" placeholder="Subject" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                        @error('subject')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <textarea name="message" id="message" rows="5" placeholder="Your Message" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="px-8 py-3 btn-primary text-white font-medium rounded-full shadow-lg">Send Message</button>
                </form>
            </div>
            <div class="space-y-8">
                <div>
                    <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-3 italic">Contact Info</p>
                    <h2 class="text-4xl font-serif font-bold text-charcoal dark:text-ivory mb-8">Visit Our Salon</h2>
                </div>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-full bg-rose-light/50 dark:bg-rose-dark/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-rose-dark dark:text-rose" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-charcoal dark:text-ivory">Address</h4>
                            <p class="text-charcoal/70 dark:text-ivory/70">123 Elegance Avenue<br>Beverly Hills, CA 90210</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-full bg-rose-light/50 dark:bg-rose-dark/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-rose-dark dark:text-rose" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-charcoal dark:text-ivory">Phone</h4>
                            <p class="text-charcoal/70 dark:text-ivory/70">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-full bg-rose-light/50 dark:bg-rose-dark/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-rose-dark dark:text-rose" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-charcoal dark:text-ivory">Email</h4>
                            <p class="text-charcoal/70 dark:text-ivory/70">hello@velvetluxe.com</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-full bg-rose-light/50 dark:bg-rose-dark/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-rose-dark dark:text-rose" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-charcoal dark:text-ivory">Business Hours</h4>
                            <p class="text-charcoal/70 dark:text-ivory/70">Monday - Saturday: 9:00 AM - 8:00 PM<br>Sunday: 10:00 AM - 5:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4 pt-4">
                    <a href="#" class="w-12 h-12 rounded-full bg-rose-light/50 dark:bg-rose-dark/20 flex items-center justify-center hover:bg-rose-dark dark:hover:bg-rose-dark transition-colors duration-200 group">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full bg-rose-light/50 dark:bg-rose-dark/20 flex items-center justify-center hover:bg-rose-dark dark:hover:bg-rose-dark transition-colors duration-200 group">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full bg-rose-light/50 dark:bg-rose-dark/20 flex items-center justify-center hover:bg-rose-dark dark:hover:bg-rose-dark transition-colors duration-200 group">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full bg-rose-light/50 dark:bg-rose-dark/20 flex items-center justify-center hover:bg-rose-dark dark:hover:bg-rose-dark transition-colors duration-200 group">
                        <svg class="w-5 h-5 text-rose-dark dark:text-rose group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0L5.396 7.819l.75 1.231L12 5.329l5.854 3.721.75-1.231L12.017 0zM24 11.608l-2.333-2.188-2.083 2.188L24 15.983l-1.917 2.823-2.083-2.188v3.706h-2.5V12.75l-3.5-3.674-3.5 3.674v9.402h-2.5v-3.706l-2.083 2.188L0 15.983l4.416-4.375-2.083-2.188L0 11.608l4.458-4.375L6.5 9.313V5.609h2.5v4.047l3.5 3.721 3.5-3.721V5.609h2.5v3.704l2.042-2.08 4.458 4.375z"/></svg>
                    </a>
                </div>
                <div class="rounded-2xl overflow-hidden shadow-sm mt-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.9337!2d-118.4005!3d34.0736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDA0JzI0LjkiTiAxMTjCsDI0JzAxLjgiVw!5e0!3m2!1sen!2sus!4v1" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
