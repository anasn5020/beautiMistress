@extends('layouts.master')

@section('title', 'Manage Users')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <p class="font-alt text-rose-dark dark:text-rose text-lg tracking-[0.2em] uppercase mb-1 italic">Admin</p>
                <h1 class="text-4xl font-serif font-bold text-charcoal dark:text-ivory">Users</h1>
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
        @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl text-red-800 dark:text-red-300">{{ session('error') }}</div>
        @endif

        <div class="bg-white dark:bg-charcoal rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-rose/10 dark:border-rose-dark/10 text-left">
                            <th class="py-4 px-6 text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Name</th>
                            <th class="py-4 px-6 text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Email</th>
                            <th class="py-4 px-6 text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Phone</th>
                            <th class="py-4 px-6 text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Role</th>
                            <th class="py-4 px-6 text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Joined</th>
                            <th class="py-4 px-6 text-right text-xs font-medium text-charcoal/50 dark:text-ivory/50 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-rose/10 dark:divide-rose-dark/10">
                        @forelse($users ?? [] as $user)
                        <tr class="hover:bg-rose-light/20 dark:hover:bg-rose-dark/5 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-full bg-rose-dark/10 dark:bg-rose/10 flex items-center justify-center text-rose-dark dark:text-rose text-sm font-semibold">{{ substr($user->name, 0, 1) }}</div>
                                    <span class="text-charcoal dark:text-ivory font-medium">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-charcoal/70 dark:text-ivory/70">{{ $user->email }}</td>
                            <td class="py-4 px-6 text-charcoal/70 dark:text-ivory/70">{{ $user->phone ?? '—' }}</td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 text-xs rounded-full {{ $user->is_admin ? 'bg-rose-dark/10 dark:bg-rose/10 text-rose-dark dark:text-rose' : 'bg-charcoal/5 dark:bg-ivory/5 text-charcoal/60 dark:text-ivory/60' }}">
                                    {{ $user->is_admin ? 'Admin' : 'Client' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-charcoal/50 dark:text-ivory/50 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="py-4 px-6 text-right">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-rose-dark dark:text-rose hover:underline text-sm font-medium">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-charcoal/50 dark:text-ivory/50">No users found.</td>
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
