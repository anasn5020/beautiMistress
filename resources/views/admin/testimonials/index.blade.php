@extends('layouts.master')

@section('title', 'Manage Testimonials')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory">Testimonials</h1>
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h16M4 18h16"/></svg>
            </button>
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
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Client</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Rating</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Content</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Status</th>
                            <th class="text-right py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials ?? [] as $testimonial)
                        <tr class="border-b border-rose/5 dark:border-rose-dark/5 hover:bg-rose-light/10 dark:hover:bg-rose-dark/5 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    @if($testimonial->image)
                                    <img src="{{ $testimonial->image }}" alt="{{ $testimonial->client_name }}" class="w-8 h-8 rounded-full object-cover">
                                    @endif
                                    <span class="text-charcoal dark:text-ivory font-medium">{{ $testimonial->client_name }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-rose-dark dark:text-rose' : 'text-charcoal/20 dark:text-ivory/20' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    @endfor
                                </div>
                            </td>
                            <td class="py-4 px-6 text-charcoal/70 dark:text-ivory/70 max-w-xs truncate">{{ Str::limit($testimonial->content, 80) }}</td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 text-xs rounded-full {{ $testimonial->is_approved ? 'bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-300' : 'bg-yellow-100 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-300' }}">{{ $testimonial->is_approved ? 'Approved' : 'Pending' }}</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                @if(!$testimonial->is_approved)
                                <form method="POST" action="{{ route('admin.testimonials.approve', $testimonial) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-green-600 hover:text-green-800 text-sm font-medium mr-3">Approve</button>
                                </form>
                                @endif
                                <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center text-charcoal/50 dark:text-ivory/50">No testimonials found</td>
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
