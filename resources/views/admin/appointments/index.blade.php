@extends('layouts.master')

@section('title', 'Manage Appointments')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false, filter: '{{ request('status', 'all') }}' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory">Appointments</h1>
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
        <div class="flex flex-wrap gap-3 mb-8">
            <button @click="filter = 'all'" class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300" :class="filter === 'all' ? 'bg-rose-dark text-white shadow-lg' : 'bg-white dark:bg-charcoal text-charcoal dark:text-ivory border border-rose/20 dark:border-rose-dark/20 hover:border-rose-dark dark:hover:border-rose'">All</button>
            <button @click="filter = 'pending'" class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300" :class="filter === 'pending' ? 'bg-rose-dark text-white shadow-lg' : 'bg-white dark:bg-charcoal text-charcoal dark:text-ivory border border-rose/20 dark:border-rose-dark/20 hover:border-rose-dark dark:hover:border-rose'">Pending</button>
            <button @click="filter = 'confirmed'" class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300" :class="filter === 'confirmed' ? 'bg-rose-dark text-white shadow-lg' : 'bg-white dark:bg-charcoal text-charcoal dark:text-ivory border border-rose/20 dark:border-rose-dark/20 hover:border-rose-dark dark:hover:border-rose'">Confirmed</button>
            <button @click="filter = 'completed'" class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300" :class="filter === 'completed' ? 'bg-rose-dark text-white shadow-lg' : 'bg-white dark:bg-charcoal text-charcoal dark:text-ivory border border-rose/20 dark:border-rose-dark/20 hover:border-rose-dark dark:hover:border-rose'">Completed</button>
            <button @click="filter = 'cancelled'" class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300" :class="filter === 'cancelled' ? 'bg-rose-dark text-white shadow-lg' : 'bg-white dark:bg-charcoal text-charcoal dark:text-ivory border border-rose/20 dark:border-rose-dark/20 hover:border-rose-dark dark:hover:border-rose'">Cancelled</button>
        </div>
        <div class="bg-white dark:bg-charcoal rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-rose/10 dark:border-rose-dark/10 bg-rose-light/20 dark:bg-rose-dark/5">
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Client</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Service</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Staff</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Date</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Time</th>
                            <th class="text-left py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Status</th>
                            <th class="text-right py-4 px-6 text-charcoal/60 dark:text-ivory/60 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments ?? [] as $appointment)
                        <tr x-show="filter === 'all' || filter === '{{ $appointment->status }}'" x-transition class="border-b border-rose/5 dark:border-rose-dark/5 hover:bg-rose-light/10 dark:hover:bg-rose-dark/5 transition-colors duration-200">
                            <td class="py-4 px-6 text-charcoal dark:text-ivory font-medium">{{ $appointment->client_name ?? $appointment->user->name ?? 'Client' }}</td>
                            <td class="py-4 px-6 text-charcoal dark:text-ivory">{{ $appointment->service->name ?? 'Service' }}</td>
                            <td class="py-4 px-6 text-charcoal dark:text-ivory">{{ $appointment->staff->name ?? 'Staff' }}</td>
                            <td class="py-4 px-6 text-charcoal dark:text-ivory">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                            <td class="py-4 px-6 text-charcoal dark:text-ivory">{{ $appointment->appointment_time }}</td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 text-xs rounded-full
                                    {{ $appointment->status === 'completed' ? 'bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-300' : '' }}
                                    {{ $appointment->status === 'confirmed' ? 'bg-blue-100 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : '' }}
                                    {{ $appointment->status === 'pending' ? 'bg-yellow-100 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-300' : '' }}
                                    {{ $appointment->status === 'cancelled' ? 'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-300' : '' }}">
                                    {{ ucfirst($appointment->status ?? 'pending') }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                @if($appointment->status === 'pending')
                                <form method="POST" action="{{ route('admin.appointments.confirm', $appointment) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-green-600 hover:text-green-800 text-sm font-medium mr-2">Confirm</button>
                                </form>
                                @endif
                                @if($appointment->status === 'confirmed')
                                <form method="POST" action="{{ route('admin.appointments.complete', $appointment) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-blue-600 hover:text-blue-800 text-sm font-medium mr-2">Complete</button>
                                </form>
                                @endif
                                @if($appointment->status !== 'completed' && $appointment->status !== 'cancelled')
                                <form method="POST" action="{{ route('admin.appointments.cancel', $appointment) }}" class="inline" onsubmit="return confirm('Cancel this appointment?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">Cancel</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-16 text-center text-charcoal/50 dark:text-ivory/50">No appointments found</td>
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
