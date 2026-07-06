<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('user_id', auth()->id())
            ->where('appointment_date', '>=', today())
            ->whereNotIn('status', ['cancelled', 'completed'])
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->get();

        $history = Appointment::where('user_id', auth()->id())
            ->where(function ($query) {
                $query->where('appointment_date', '<', today())
                    ->orWhereIn('status', ['cancelled', 'completed']);
            })
            ->orderByDesc('appointment_date')
            ->get();

        return view('client.dashboard', compact('appointments', 'history'));
    }
}
