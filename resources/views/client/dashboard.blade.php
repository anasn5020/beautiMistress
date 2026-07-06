@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory">Welcome, {{ Auth::user()->name }}</h1>
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="lg:w-64 flex-shrink-0">
                <div class="bg-white dark:bg-charcoal rounded-2xl shadow-sm border border-rose/10 dark:border-rose-dark/10 overflow-hidden lg:sticky lg:top-28" :class="sidebarOpen ? 'block' : 'hidden lg:block'">
                    <div class="p-6 text-center border-b border-rose/10 dark:border-rose-dark/10">
                        <div class="w-20 h-20 rounded-full bg-rose-light dark:bg-rose-dark/20 flex items-center justify-center mx-auto mb-3">
                            <span class="text-2xl font-serif font-bold text-rose-dark dark:text-rose">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <h3 class="font-semibold text-charcoal dark:text-ivory">{{ Auth::user()->name }}</h3>
                        <p class="text-charcoal/50 dark:text-ivory/50 text-sm">{{ Auth::user()->email }}</p>
                    </div>
                    <nav class="p-4 space-y-1">
                        <a href="{{ route('client.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose font-medium text-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('client.appointments') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10 transition-colors duration-200 text-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>My Appointments</span>
                        </a>
                        <a href="{{ route('client.appointments') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10 transition-colors duration-200 text-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            <span>Upcoming Bookings</span>
                        </a>
                        <div class="flex items-center space-x-3 px-4 py-3 rounded-xl text-charcoal dark:text-ivory text-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <span>Loyalty Points</span>
                                <span class="block text-rose-dark dark:text-rose font-semibold">250 pts</span>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="pt-2">
                            @csrf
                            <button type="submit" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10 transition-colors duration-200 text-sm w-full">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </nav>
                </div>
            </div>
            <div class="flex-1 space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-charcoal rounded-2xl p-6 shadow-sm">
                        <p class="text-charcoal/50 dark:text-ivory/50 text-sm mb-1">Upcoming Appointments</p>
                        <p class="text-3xl font-bold text-charcoal dark:text-ivory">{{ count($appointments ?? []) }}</p>
                    </div>
                    <div class="bg-white dark:bg-charcoal rounded-2xl p-6 shadow-sm">
                        <p class="text-charcoal/50 dark:text-ivory/50 text-sm mb-1">Completed</p>
                        <p class="text-3xl font-bold text-charcoal dark:text-ivory">{{ count($history ?? []) }}</p>
                    </div>
                    <div class="bg-white dark:bg-charcoal rounded-2xl p-6 shadow-sm">
                        <p class="text-charcoal/50 dark:text-ivory/50 text-sm mb-1">Loyalty Points</p>
                        <p class="text-3xl font-bold text-rose-dark dark:text-rose">250</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-serif font-bold text-charcoal dark:text-ivory">Upcoming Appointments</h2>
                        <a href="{{ route('booking') }}" class="px-4 py-2 btn-primary text-white text-sm font-medium rounded-full">Book New</a>
                    </div>
                    @forelse($appointments ?? [] as $appointment)
                    <div class="flex items-center justify-between py-4 border-b border-rose/10 dark:border-rose-dark/10 last:border-0">
                        <div>
                            <p class="font-semibold text-charcoal dark:text-ivory">{{ $appointment->service->name ?? 'Service' }}</p>
                            <p class="text-sm text-charcoal/50 dark:text-ivory/50">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }} at {{ $appointment->appointment_time }}</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose">{{ $appointment->status ?? 'Confirmed' }}</span>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <p class="text-charcoal/50 dark:text-ivory/50">No upcoming appointments</p>
                        <a href="{{ route('booking') }}" class="inline-block mt-4 text-rose-dark dark:text-rose hover:underline text-sm font-medium">Book your first appointment</a>
                    </div>
                    @endforelse
                </div>

                <div class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                    <h2 class="text-xl font-serif font-bold text-charcoal dark:text-ivory mb-6">Recent Appointment History</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-rose/10 dark:border-rose-dark/10">
                                    <th class="text-left py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Date</th>
                                    <th class="text-left py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Service</th>
                                    <th class="text-left py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Staff</th>
                                    <th class="text-left py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Status</th>
                                    <th class="text-right py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($history ?? [] as $appointment)
                                <tr class="border-b border-rose/5 dark:border-rose-dark/5">
                                    <td class="py-3 px-2 text-charcoal dark:text-ivory">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                                    <td class="py-3 px-2 text-charcoal dark:text-ivory">{{ $appointment->service->name ?? 'Service' }}</td>
                                    <td class="py-3 px-2 text-charcoal dark:text-ivory">{{ $appointment->staff->name ?? 'Staff' }}</td>
                                    <td class="py-3 px-2">
                                        <span class="px-2 py-1 text-xs rounded-full {{ $appointment->status === 'completed' ? 'bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-300' : ($appointment->status === 'cancelled' ? 'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-300' : 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose') }}">{{ $appointment->status ?? 'Confirmed' }}</span>
                                    </td>
                                    <td class="py-3 px-2 text-right text-charcoal dark:text-ivory font-medium">${{ number_format($appointment->total_price ?? 0, 2) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-charcoal/50 dark:text-ivory/50">No appointment history</td>
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
