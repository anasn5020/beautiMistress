@extends('layouts.master')

@section('title', 'Contact Messages')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-1 italic">Admin</p>
                <h1 class="text-4xl font-serif font-bold text-charcoal dark:text-ivory">Contact Messages</h1>
            </div>
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            @include('admin.partials.sidebar')
            <div class="flex-1">

        @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl text-green-800 dark:text-green-300">{{ session('success') }}</div>
        @endif

        <div class="bg-white dark:bg-charcoal rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-rose/10 dark:border-rose-dark/10 text-left">
                            <th class="py-4 px-6 text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">From</th>
                            <th class="py-4 px-6 text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Subject</th>
                            <th class="py-4 px-6 text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Date</th>
                            <th class="py-4 px-6 text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Status</th>
                            <th class="py-4 px-6 text-right text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-rose/10 dark:divide-rose-dark/10">
                        @forelse($messages ?? [] as $message)
                        <tr class="hover:bg-rose-light/20 dark:hover:bg-rose-dark/5 transition-colors duration-200 {{ !$message->is_read ? 'font-semibold' : '' }}">
                            <td class="py-4 px-6">
                                <div class="text-charcoal dark:text-ivory">{{ $message->name }}</div>
                                <div class="text-charcoal/50 dark:text-ivory/50 text-sm">{{ $message->email }}</div>
                            </td>
                            <td class="py-4 px-6 text-charcoal/70 dark:text-ivory/70">{{ $message->subject ?? '—' }}</td>
                            <td class="py-4 px-6 text-charcoal/50 dark:text-ivory/50 text-sm">{{ $message->created_at->format('M d, Y g:i A') }}</td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 text-xs rounded-full {{ $message->is_read ? 'bg-charcoal/5 dark:bg-ivory/5 text-charcoal/60 dark:text-ivory/60' : 'bg-rose-dark/10 dark:bg-rose/10 text-rose-dark dark:text-rose' }}">
                                    {{ $message->is_read ? 'Read' : 'New' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right space-x-3">
                                <a href="{{ route('admin.contacts.show', $message) }}" class="text-rose-dark dark:text-rose hover:underline text-sm font-medium">View</a>
                                <form method="POST" action="{{ route('admin.contacts.destroy', $message) }}" class="inline" onsubmit="return confirm('Delete this message?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-charcoal/50 dark:text-ivory/50">No messages yet.</td>
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
