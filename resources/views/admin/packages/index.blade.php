@extends('layouts.master')

@section('title', 'Manage Packages')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory">Packages</h1>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.packages.create') }}" class="px-6 py-2.5 btn-primary text-white text-sm font-medium rounded-full">Add New Package</a>
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                    <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            @include('admin.partials.sidebar')
            <div class="flex-1">
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-2xl">
            <p class="text-green-800 dark:text-green-300">{{ session('success') }}</p>
        </div>
        @endif
        <div class="bg-white dark:bg-charcoal rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-rose/10 dark:border-rose-dark/10 bg-rose-light/20 dark:bg-rose-dark/5">
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Name</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Tier</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Price</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Active</th>
                            <th class="text-right py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($packages ?? [] as $package)
                        <tr class="border-b border-rose/5 dark:border-rose-dark/5 hover:bg-rose-light/10 dark:hover:bg-rose-dark/5 transition-colors duration-200">
                            <td class="py-4 px-6 text-charcoal dark:text-ivory font-medium">{{ $package->name }}</td>
                            <td class="py-4 px-6"><span class="px-2 py-1 text-xs rounded-full bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose">{{ $package->tier }}</span></td>
                            <td class="py-4 px-6 text-charcoal dark:text-ivory font-medium">${{ number_format($package->price, 2) }}</td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 text-xs rounded-full {{ $package->is_active ? 'bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-300' : 'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-300' }}">{{ $package->is_active ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a href="{{ route('admin.packages.edit', $package) }}" class="text-rose-dark dark:text-rose hover:underline text-sm font-medium mr-3">Edit</a>
                                <form method="POST" action="{{ route('admin.packages.destroy', $package) }}" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center text-charcoal/50 dark:text-ivory/50">No packages found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>
@endsection
