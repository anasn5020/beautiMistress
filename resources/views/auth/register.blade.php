@extends('layouts.master')

@section('title', 'Register')

@section('content')
<section class="min-h-screen flex items-center justify-center py-32 px-4 bg-ivory dark:bg-charcoal/95 transition-colors duration-500">
    <div class="w-full max-w-md">
        <div class="bg-white dark:bg-charcoal rounded-3xl shadow-sm border border-rose/10 dark:border-rose-dark/10 p-10">
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="text-3xl font-serif font-bold text-rose-dark dark:text-rose">VelvetLuxe</a>
                <p class="text-charcoal/60 dark:text-ivory/60 mt-2 text-sm">Begin your beauty journey</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200" required>
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200" required>
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Phone</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                        @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Password</label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200" required>
                        @error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200" required>
                    </div>
                    <button type="submit" class="w-full py-3 btn-primary text-white font-medium rounded-full shadow-lg">Register</button>
                </div>
            </form>
            <p class="text-center mt-6 text-sm text-charcoal/60 dark:text-ivory/60">
                Already have an account?
                <a href="{{ route('login') }}" class="text-rose-dark dark:text-rose hover:underline font-medium">Login here</a>
            </p>
        </div>
    </div>
</section>
@endsection
