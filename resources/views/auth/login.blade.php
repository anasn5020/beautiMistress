@extends('layouts.master')

@section('title', 'Login')

@section('content')
<section class="min-h-screen flex items-center justify-center py-32 px-4 bg-ivory dark:bg-charcoal/95 transition-colors duration-500">
    <div class="w-full max-w-md">
        <div class="bg-white dark:bg-charcoal rounded-3xl shadow-sm border border-rose/10 dark:border-rose-dark/10 p-10">
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="text-3xl font-serif font-bold text-rose-dark dark:text-rose">VelvetLuxe</a>
                <p class="text-charcoal/60 dark:text-ivory/60 mt-2 text-sm">Welcome back to elegance</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200" required autofocus>
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Password</label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-3 bg-rose-light/20 dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory placeholder-charcoal/40 dark:placeholder-ivory/40 focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200" required>
                        @error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-rose/30 dark:border-rose-dark/30 text-rose-dark focus:ring-rose-dark dark:focus:ring-rose">
                            <span class="text-sm text-charcoal/70 dark:text-ivory/70">Remember me</span>
                        </label>
                        @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-rose-dark dark:text-rose hover:underline">Forgot password?</a>
                        @endif
                    </div>
                    <button type="submit" class="w-full py-3 btn-primary text-white font-medium rounded-full shadow-lg">Login</button>
                </div>
            </form>
            <p class="text-center mt-6 text-sm text-charcoal/60 dark:text-ivory/60">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-rose-dark dark:text-rose hover:underline font-medium">Register here</a>
            </p>
        </div>
    </div>
</section>
@endsection
