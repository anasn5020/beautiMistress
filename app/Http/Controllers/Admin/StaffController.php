<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::latest()->get();

        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'role' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ]);

        Staff::create($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Staff member created successfully.');
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.form', ['staffMember' => $staff]);
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'role' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ]);

        $staff->update($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Staff member updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
