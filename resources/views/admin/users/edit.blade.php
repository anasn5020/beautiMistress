@extends('layouts.master')

@section('title', 'Edit User')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-1 italic">Admin</p>
                <h1 class="text-4xl font-serif font-bold text-charcoal dark:text-ivory">Edit User</h1>
            </div>
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            @include('admin.partials.sidebar')
            <div class="flex-1">

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Phone</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }} class="w-4 h-4 rounded border-rose/30 text-rose-dark focus:ring-rose-dark">
                <label for="is_admin" class="text-sm font-medium text-charcoal dark:text-ivory">Admin Privileges</label>
            </div>

            <div class="flex items-center space-x-4 pt-4">
                <button type="submit" class="px-6 py-3 btn-primary text-white font-medium rounded-full">Update User</button>
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 btn-secondary text-charcoal dark:text-ivory font-medium rounded-full">Cancel</a>
            </div>
        </form>
            </div>
        </div>
    </div>
</section>
@endsection
