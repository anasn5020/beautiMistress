@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<section class="pt-28 pb-16 bg-ivory dark:bg-charcoal/95 min-h-screen transition-colors duration-500" x-data="{ sidebarOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory">Admin Dashboard</h1>
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-white dark:bg-charcoal border border-rose/20 dark:border-rose-dark/20">
                <svg class="w-6 h-6 text-charcoal dark:text-ivory" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            @include('admin.partials.sidebar')
            <div class="flex-1 space-y-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white dark:bg-charcoal rounded-2xl p-6 shadow-sm">
                        <p class="text-charcoal/50 dark:text-ivory/50 text-sm mb-1">Total Services</p>
                        <p class="text-3xl font-bold text-charcoal dark:text-ivory">{{ $servicesCount ?? 0 }}</p>
                    </div>
                    <div class="bg-white dark:bg-charcoal rounded-2xl p-6 shadow-sm">
                        <p class="text-charcoal/50 dark:text-ivory/50 text-sm mb-1">Total Staff</p>
                        <p class="text-3xl font-bold text-charcoal dark:text-ivory">{{ $staffCount ?? 0 }}</p>
                    </div>
                    <div class="bg-white dark:bg-charcoal rounded-2xl p-6 shadow-sm">
                        <p class="text-charcoal/50 dark:text-ivory/50 text-sm mb-1">Total Appointments</p>
                        <p class="text-3xl font-bold text-charcoal dark:text-ivory">{{ $appointmentsCount ?? 0 }}</p>
                    </div>
                    <div class="bg-white dark:bg-charcoal rounded-2xl p-6 shadow-sm">
                        <p class="text-charcoal/50 dark:text-ivory/50 text-sm mb-1">Total Clients</p>
                        <p class="text-3xl font-bold text-charcoal dark:text-ivory">{{ $clientsCount ?? 0 }}</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-serif font-bold text-charcoal dark:text-ivory">Recent Appointments</h2>
                        <a href="{{ route('admin.appointments.index') }}" class="text-rose-dark dark:text-rose text-sm font-medium hover:underline">View All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-rose/10 dark:border-rose-dark/10">
                                    <th class="text-left py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Client</th>
                                    <th class="text-left py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Service</th>
                                    <th class="text-left py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Staff</th>
                                    <th class="text-left py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Date</th>
                                    <th class="text-left py-3 px-2 text-charcoal/60 dark:text-ivory/60 font-medium">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentAppointments ?? [] as $appointment)
                                <tr class="border-b border-rose/5 dark:border-rose-dark/5">
                                    <td class="py-3 px-2 text-charcoal dark:text-ivory">{{ $appointment->user->name ?? $appointment->client_name ?? 'Client' }}</td>
                                    <td class="py-3 px-2 text-charcoal dark:text-ivory">{{ $appointment->service->name ?? 'Service' }}</td>
                                    <td class="py-3 px-2 text-charcoal dark:text-ivory">{{ $appointment->staff->name ?? 'Staff' }}</td>
                                    <td class="py-3 px-2 text-charcoal dark:text-ivory">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                                    <td class="py-3 px-2">
                                        <span class="px-2 py-1 text-xs rounded-full {{ $appointment->status === 'completed' ? 'bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-300' : ($appointment->status === 'cancelled' ? 'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-300' : ($appointment->status === 'pending' ? 'bg-yellow-100 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-300' : 'bg-blue-100 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300')) }}">{{ ucfirst($appointment->status ?? 'pending') }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-charcoal/50 dark:text-ivory/50">No recent appointments</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('admin.services.create') }}" class="px-6 py-3 btn-primary text-white font-medium rounded-full text-sm">Add New Service</a>
                    <a href="{{ route('admin.staff.create') }}" class="px-6 py-3 btn-secondary text-charcoal dark:text-ivory font-medium rounded-full text-sm">Add New Staff</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
