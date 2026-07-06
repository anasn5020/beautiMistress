<nav class="fixed top-0 left-0 right-0 z-50 bg-ivory/85 dark:bg-charcoal/85 backdrop-blur-2xl border-b border-rose/10 dark:border-rose-dark/10 transition-colors duration-500" x-data="{ mobileOpen: false, dropdownOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                <span class="text-2xl font-serif font-bold bg-gradient-to-r from-rose-dark to-champagne dark:from-lavender dark:to-gold bg-clip-text text-transparent transition-all duration-500 group-hover:from-champagne group-hover:to-rose-dark">VelvetLuxe</span>
            </a>
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-rose-dark dark:text-gold after:w-full' : 'text-rose-dark/70 dark:text-ivory/70' }} hover:text-rose-dark dark:hover:text-gold transition-colors duration-300 font-medium text-sm tracking-wider uppercase">Home</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'text-rose-dark dark:text-gold after:w-full' : 'text-rose-dark/70 dark:text-ivory/70' }} hover:text-rose-dark dark:hover:text-gold transition-colors duration-300 font-medium text-sm tracking-wider uppercase">About</a>
                <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'text-rose-dark dark:text-gold after:w-full' : 'text-rose-dark/70 dark:text-ivory/70' }} hover:text-rose-dark dark:hover:text-gold transition-colors duration-300 font-medium text-sm tracking-wider uppercase">Services</a>
                <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'text-rose-dark dark:text-gold after:w-full' : 'text-rose-dark/70 dark:text-ivory/70' }} hover:text-rose-dark dark:hover:text-gold transition-colors duration-300 font-medium text-sm tracking-wider uppercase">Gallery</a>
                <a href="{{ route('pricing') }}" class="nav-link {{ request()->routeIs('pricing') ? 'text-rose-dark dark:text-gold after:w-full' : 'text-rose-dark/70 dark:text-ivory/70' }} hover:text-rose-dark dark:hover:text-gold transition-colors duration-300 font-medium text-sm tracking-wider uppercase">Pricing</a>
                <a href="{{ route('booking') }}" class="nav-link {{ request()->routeIs('booking') ? 'text-rose-dark dark:text-gold after:w-full' : 'text-rose-dark/70 dark:text-ivory/70' }} hover:text-rose-dark dark:hover:text-gold transition-colors duration-300 font-medium text-sm tracking-wider uppercase">Book Now</a>
                <a href="{{ route('testimonials') }}" class="nav-link {{ request()->routeIs('testimonials') ? 'text-rose-dark dark:text-gold after:w-full' : 'text-rose-dark/70 dark:text-ivory/70' }} hover:text-rose-dark dark:hover:text-gold transition-colors duration-300 font-medium text-sm tracking-wider uppercase">Testimonials</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-rose-dark dark:text-gold after:w-full' : 'text-rose-dark/70 dark:text-ivory/70' }} hover:text-rose-dark dark:hover:text-gold transition-colors duration-300 font-medium text-sm tracking-wider uppercase">Contact</a>
            </div>
            <div class="flex items-center space-x-4">
                <button @click="darkMode = !darkMode" class="relative w-10 h-10 rounded-full bg-rose-light/50 dark:bg-rose-dark/20 hover:bg-rose-light dark:hover:bg-rose-dark/30 transition-all duration-500 flex items-center justify-center group" aria-label="Toggle theme">
                    <svg x-show="!darkMode" class="w-5 h-5 text-champagne dark:text-gold transition-all duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
                    </svg>
                    <svg x-show="darkMode" class="w-5 h-5 text-gold transition-all duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
                    </svg>
                </button>
                @auth
                    <div class="relative hidden lg:block" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-300">
                            <span class="text-sm font-medium tracking-wide">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white/90 dark:bg-charcoal/90 backdrop-blur-xl rounded-2xl shadow-xl border border-rose/10 dark:border-gold/10 py-2" x-cloak x-transition:enter="transition duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                            <a href="{{ route('client.dashboard') }}" class="block px-4 py-2.5 text-sm text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold hover:bg-rose-light/30 dark:hover:bg-rose-dark/10 transition-colors duration-200">Dashboard</a>
                            <a href="{{ route('client.appointments') }}" class="block px-4 py-2.5 text-sm text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold hover:bg-rose-light/30 dark:hover:bg-rose-dark/10 transition-colors duration-200">My Appointments</a>
                            @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2.5 text-sm text-rose-dark dark:text-gold font-semibold hover:bg-rose-light/30 dark:hover:bg-rose-dark/10 transition-colors duration-200">Admin Panel</a>
                            @endif
                            <div class="border-t border-rose/10 dark:border-gold/10 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2.5 text-sm text-rose-dark/70 dark:text-ivory/70 hover:text-red-500 hover:bg-rose-light/30 dark:hover:bg-rose-dark/10 transition-colors duration-200">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="hidden lg:flex items-center space-x-3">
                        <a href="{{ route('login') }}" class="px-6 py-2.5 text-sm font-medium text-rose-dark dark:text-ivory/80 border border-champagne/30 dark:border-gold/30 rounded-full hover:bg-champagne/10 dark:hover:bg-gold/10 transition-all duration-300 tracking-wide">Login</a>
                        <a href="{{ route('register') }}" class="px-6 py-2.5 text-sm font-medium text-white btn-primary rounded-full tracking-wide">Register</a>
                    </div>
                @endauth
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-full hover:bg-rose-light/50 dark:hover:bg-rose-dark/20 transition-colors duration-300">
                    <svg x-show="!mobileOpen" class="w-6 h-6 text-rose-dark dark:text-ivory/80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <svg x-show="mobileOpen" class="w-6 h-6 text-rose-dark dark:text-ivory/80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div x-show="mobileOpen" class="lg:hidden bg-ivory/95 dark:bg-charcoal/95 backdrop-blur-2xl border-t border-rose/10 dark:border-rose-dark/10" x-cloak x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="px-4 py-6 space-y-4">
            <a href="{{ route('home') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm tracking-wider uppercase">Home</a>
            <a href="{{ route('about') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm tracking-wider uppercase">About</a>
            <a href="{{ route('services') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm tracking-wider uppercase">Services</a>
            <a href="{{ route('gallery') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm tracking-wider uppercase">Gallery</a>
            <a href="{{ route('pricing') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm tracking-wider uppercase">Pricing</a>
            <a href="{{ route('booking') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm tracking-wider uppercase">Book Now</a>
            <a href="{{ route('testimonials') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm tracking-wider uppercase">Testimonials</a>
            <a href="{{ route('contact') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm tracking-wider uppercase">Contact</a>
            @auth
                <div class="gold-divider my-2"></div>
                <a href="{{ route('client.dashboard') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm">Dashboard</a>
                <a href="{{ route('client.appointments') }}" class="block py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-rose-dark dark:hover:text-gold transition-colors duration-200 font-medium text-sm">My Appointments</a>
                @if(Auth::user()->is_admin)
                <a href="{{ route('admin.dashboard') }}" class="block py-2 text-rose-dark dark:text-gold font-semibold transition-colors duration-200 font-medium text-sm">Admin Panel</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="pt-2">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 text-rose-dark/70 dark:text-ivory/70 hover:text-red-500 transition-colors duration-200 font-medium text-sm">Logout</button>
                </form>
            @else
                <div class="gold-divider my-2"></div>
                <div class="flex flex-col space-y-3 pt-2">
                    <a href="{{ route('login') }}" class="block py-2.5 text-center text-rose-dark dark:text-ivory/80 border border-champagne/30 dark:border-gold/30 rounded-full hover:bg-champagne/10 dark:hover:bg-gold/10 transition-all duration-300 text-sm font-medium tracking-wide">Login</a>
                    <a href="{{ route('register') }}" class="block py-2.5 text-center text-white btn-primary rounded-full text-sm font-medium tracking-wide">Register</a>
                </div>
            @endauth
        </div>
    </div>
</nav>