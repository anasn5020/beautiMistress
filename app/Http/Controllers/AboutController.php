<?php

namespace App\Http\Controllers;

use App\Models\Staff;

class AboutController extends Controller
{
    public function index()
    {
        $staff = Staff::where('is_active', true)->get();

        return view('about', compact('staff'));
    }
}
