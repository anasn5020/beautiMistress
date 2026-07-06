@extends('layouts.master')

@section('title', 'Book an Appointment')

@section('content')
<section class="relative pt-32 pb-20 flex items-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Booking" class="w-full h-full object-cover">
        <div class="hero-overlay-light dark:hero-overlay-dark"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
        <p class="font-alt text-rose text-lg tracking-[0.25em] uppercase mb-3 italic">Book Your Visit</p>
        <h1 class="text-5xl md:text-7xl font-serif font-bold text-ivory">Reserve Your Appointment</h1>
        <div class="gold-divider mx-auto mt-6"></div>
    </div>
</section>

<section class="py-24 bg-ivory dark:bg-charcoal/95 transition-colors duration-500" x-data="{ selectedService: '', selectedStaff: '', bookingConfirmed: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="max-w-2xl mx-auto mb-8 p-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-2xl text-center">
            <p class="text-green-800 dark:text-green-300 font-medium text-lg">{{ session('success') }}</p>
        </div>
        @endif

        <div x-show="!bookingConfirmed" class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                        <h2 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory mb-6">Select Services & Staff</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="service_id" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Service</label>
                                <select name="service_id" id="service_id" x-model="selectedService" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                                    <option value="">Select a service</option>
                                    @foreach($services ?? [] as $service)
                                    <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }} - ${{ number_format($service->price, 2) }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="staff_id" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Preferred Staff</label>
                                <select name="staff_id" id="staff_id" x-model="selectedStaff" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                                    <option value="">Any available staff</option>
                                    @foreach($staff ?? [] as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }} - {{ $member->role }}</option>
                                    @endforeach
                                </select>
                                @error('staff_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                        <h2 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory mb-6">Date & Time</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="appointment_date" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Date</label>
                                <input type="date" name="appointment_date" id="appointment_date" value="{{ old('appointment_date') }}" min="{{ date('Y-m-d') }}" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                                @error('appointment_date')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="appointment_time" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Time</label>
                                <select name="appointment_time" id="appointment_time" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                                    <option value="">Select time</option>
                                    <option value="09:00">9:00 AM</option>
                                    <option value="09:30">9:30 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="10:30">10:30 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="11:30">11:30 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="12:30">12:30 PM</option>
                                    <option value="13:00">1:00 PM</option>
                                    <option value="13:30">1:30 PM</option>
                                    <option value="14:00">2:00 PM</option>
                                    <option value="14:30">2:30 PM</option>
                                    <option value="15:00">3:00 PM</option>
                                    <option value="15:30">3:30 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                    <option value="16:30">4:30 PM</option>
                                    <option value="17:00">5:00 PM</option>
                                    <option value="17:30">5:30 PM</option>
                                    <option value="18:00">6:00 PM</option>
                                    <option value="18:30">6:30 PM</option>
                                    <option value="19:00">7:00 PM</option>
                                </select>
                                @error('appointment_time')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm">
                        <h2 class="text-2xl font-serif font-bold text-charcoal dark:text-ivory mb-6">Your Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="client_name" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Full Name</label>
                                <input type="text" name="client_name" id="client_name" value="{{ old('client_name', auth()->user()->name ?? '') }}" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                                @error('client_name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="client_email" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Email</label>
                                <input type="email" name="client_email" id="client_email" value="{{ old('client_email', auth()->user()->email ?? '') }}" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                                @error('client_email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="client_phone" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Phone</label>
                                <input type="tel" name="client_phone" id="client_phone" value="{{ old('client_phone') }}" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">
                                @error('client_phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div></div>
                        </div>
                        <div class="mt-6">
                            <label for="notes" class="block text-sm font-medium text-charcoal dark:text-ivory mb-2">Special Requests</label>
                            <textarea name="notes" id="notes" rows="3" class="w-full px-4 py-3 bg-ivory dark:bg-charcoal/70 border border-rose/20 dark:border-rose-dark/20 rounded-xl text-charcoal dark:text-ivory focus:outline-none focus:border-rose-dark dark:focus:border-rose transition-colors duration-200">{{ old('notes') }}</textarea>
                            @error('notes')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="px-8 py-3 btn-primary text-white font-medium rounded-full shadow-lg">Confirm Booking</button>
                    </div>
                </form>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-charcoal rounded-2xl p-8 shadow-sm sticky top-28">
                    <h3 class="text-xl font-serif font-bold text-charcoal dark:text-ivory mb-6">Booking Summary</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-charcoal/60 dark:text-ivory/60">Service</span>
                            <span class="text-charcoal dark:text-ivory font-medium" x-text="selectedService ? document.getElementById('service_id')?.options[document.getElementById('service_id')?.selectedIndex]?.text?.split(' - ')[0] || 'Selected' : 'Not selected'"></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-charcoal/60 dark:text-ivory/60">Staff</span>
                            <span class="text-charcoal dark:text-ivory font-medium" x-text="selectedStaff ? document.getElementById('staff_id')?.options[document.getElementById('staff_id')?.selectedIndex]?.text?.split(' - ')[0] || 'Selected' : 'Any Available'"></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-charcoal/60 dark:text-ivory/60">Date</span>
                            <span class="text-charcoal dark:text-ivory font-medium" x-text="document.getElementById('appointment_date')?.value || 'Not selected'"></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-charcoal/60 dark:text-ivory/60">Time</span>
                            <span class="text-charcoal dark:text-ivory font-medium" x-text="document.getElementById('appointment_time')?.value ? document.getElementById('appointment_time')?.options[document.getElementById('appointment_time')?.selectedIndex]?.text : 'Not selected'"></span>
                        </div>
                        <div class="border-t border-rose/20 dark:border-rose-dark/20 pt-4">
                            <div class="flex justify-between">
                                <span class="text-charcoal dark:text-ivory font-semibold">Total</span>
                                <span class="text-rose-dark dark:text-rose font-bold text-xl" x-text="'$' + (parseFloat(document.getElementById('service_id')?.options[document.getElementById('service_id')?.selectedIndex]?.dataset?.price || 0)).toFixed(2)"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="bookingConfirmed" class="max-w-2xl mx-auto text-center py-16" x-cloak>
            <div class="w-20 h-20 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h2 class="text-3xl font-serif font-bold text-charcoal dark:text-ivory mb-4">Booking Confirmed!</h2>
            <p class="text-charcoal/70 dark:text-ivory/70 mb-8">Thank you for booking with VelvetLuxe. We look forward to pampering you!</p>
            <a href="{{ route('home') }}" class="px-8 py-3 btn-primary text-white font-medium rounded-full">Return Home</a>
        </div>
    </div>
</section>
@endsection
