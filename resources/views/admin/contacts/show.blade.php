@extends('layouts.master')

@section('title', 'Message from ' . $contact->name)

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory">Message Details</h1>
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            @include('admin.partials.sidebar')
            <div class="flex-1">
        <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center text-rose-dark dark:text-rose hover:underline mb-6">
            <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Messages
        </a>

        <div class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory">{{ $contact->subject ?? 'No Subject' }}</h1>
                    <p class="text-charcoal/50 dark:text-ivory/50 text-sm mt-1">{{ $contact->created_at->format('F d, Y g:i A') }}</p>
                </div>
                <span class="px-3 py-1 text-xs rounded-full {{ $contact->is_read ? 'bg-charcoal/5 dark:bg-ivory/5 text-charcoal/60 dark:text-ivory/60' : 'bg-rose-dark/10 dark:bg-rose/10 text-rose-dark dark:text-rose' }}">
                    {{ $contact->is_read ? 'Read' : 'New' }}
                </span>
            </div>

            <div class="flex items-center space-x-3 mb-6 pb-6 border-b border-rose/10 dark:border-rose-dark/10">
                <div class="w-10 h-10 rounded-full bg-rose-dark/10 dark:bg-rose/10 flex items-center justify-center text-rose-dark dark:text-rose font-semibold">{{ substr($contact->name, 0, 1) }}</div>
                <div>
                    <p class="font-semibold text-charcoal dark:text-ivory">{{ $contact->name }}</p>
                    <p class="text-charcoal/50 dark:text-ivory/50 text-sm">{{ $contact->email }}</p>
                </div>
            </div>

            <div class="prose prose-rose dark:prose-invert max-w-none">
                <p class="text-charcoal/80 dark:text-ivory/80 leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</p>
            </div>

            <div class="mt-8 pt-6 border-t border-rose/10 dark:border-rose-dark/10 flex justify-between">
                <a href="mailto:{{ $contact->email }}" class="px-6 py-3 btn-primary text-white font-medium rounded-full inline-flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Reply via Email</span>
                </a>
                <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Delete this message?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-red-500/10 hover:bg-red-500 text-red-600 hover:text-white rounded-full text-sm font-medium transition-all duration-300">Delete Message</button>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>
@endsection
