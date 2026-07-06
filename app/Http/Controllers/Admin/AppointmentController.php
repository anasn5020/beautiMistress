<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with(['service', 'staff', 'user']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->where('appointment_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('appointment_date', '<=', $request->date_to);
        }

        $appointments = $query->latest()->paginate(20);

        return view('admin.appointments.index', compact('appointments'));
    }

    public function confirm(Appointment $appointment)
    {
        $appointment->update(['status' => 'confirmed']);

        return redirect()->back()->with('success', 'Appointment confirmed successfully.');
    }

    public function complete(Appointment $appointment)
    {
        $appointment->update(['status' => 'completed']);

        return redirect()->back()->with('success', 'Appointment completed successfully.');
    }

    public function cancel(Appointment $appointment)
    {
        $appointment->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Appointment cancelled successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
