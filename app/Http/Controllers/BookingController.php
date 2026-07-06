<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->get();
        $staff = Staff::where('is_active', true)->get();

        return view('booking', compact('services', 'staff'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => ['required', 'exists:services,id'],
            'staff_id' => ['required', 'exists:staff,id'],
            'appointment_date' => ['required', 'date', 'after:today'],
            'appointment_time' => ['required'],
            'client_name' => ['required', 'string', 'max:255'],
            'client_email' => ['required', 'email'],
            'client_phone' => ['required', 'string', 'max:20'],
            'notes' => ['nullable', 'string'],
        ]);

        $service = Service::findOrFail($validated['service_id']);

        $appointment = Appointment::create([
            'user_id' => auth()->id(),
            'service_id' => $validated['service_id'],
            'staff_id' => $validated['staff_id'],
            'client_name' => $validated['client_name'],
            'client_email' => $validated['client_email'],
            'client_phone' => $validated['client_phone'],
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'notes' => $validated['notes'],
            'status' => 'pending',
            'total_price' => $service->price,
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }
}
