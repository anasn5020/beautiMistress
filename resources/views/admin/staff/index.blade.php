@extends('layouts.master')

@section('title', 'Manage Staff')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory">Staff</h1>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.staff.create') }}" class="px-6 py-2.5 btn-primary text-white text-sm font-medium rounded-full">Add New Staff</a>
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
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Email</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Phone</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Role</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Active</th>
                            <th class="text-right py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($staff ?? [] as $member)
                        <tr class="border-b border-rose/5 dark:border-rose-dark/5 hover:bg-rose-light/10 dark:hover:bg-rose-dark/5 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    @if($member->image)
                                    <img src="{{ $member->image }}" alt="{{ $member->name }}" class="w-10 h-10 rounded-full object-cover">
                                    @endif
                                    <span class="text-charcoal dark:text-ivory font-medium">{{ $member->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-charcoal dark:text-ivory">{{ $member->email }}</td>
                            <td class="py-4 px-6 text-charcoal dark:text-ivory">{{ $member->phone }}</td>
                            <td class="py-4 px-6"><span class="px-2 py-1 text-xs rounded-full bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose">{{ $member->role }}</span></td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 text-xs rounded-full {{ $member->is_active ? 'bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-300' : 'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-300' }}">{{ $member->is_active ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a href="{{ route('admin.staff.edit', $member) }}" class="text-rose-dark dark:text-rose hover:underline text-sm font-medium mr-3">Edit</a>
                                <form method="POST" action="{{ route('admin.staff.destroy', $member) }}" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-16 text-center text-charcoal/50 dark:text-ivory/50">No staff found</td>
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
