<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $servicesCount = Service::count();
        $staffCount = Staff::count();
        $appointmentsCount = Appointment::count();
        $clientsCount = User::where('is_admin', false)->count();

        $recentAppointments = Appointment::with(['service', 'staff', 'user'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'servicesCount',
            'staffCount',
            'appointmentsCount',
            'clientsCount',
            'recentAppointments'
        ));
    }
}
