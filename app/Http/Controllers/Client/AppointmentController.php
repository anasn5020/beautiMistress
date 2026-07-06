<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('user_id', auth()->id())
            ->orderByDesc('appointment_date')
            ->get();

        return view('client.appointments', compact('appointments'));
    }

    public function cancel(Appointment $appointment)
    {
        if ($appointment->user_id !== auth()->id()) {
            abort(403);
        }

        if (! in_array($appointment->status, ['pending', 'confirmed'])) {
            return redirect()->back()->with('error', 'This appointment cannot be cancelled.');
        }

        $appointment->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Appointment cancelled successfully.');
    }
}
