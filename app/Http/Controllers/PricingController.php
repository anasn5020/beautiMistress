<?php

namespace App\Http\Controllers;

use App\Models\Package;

class PricingController extends Controller
{
    public function index()
    {
        $packages = Package::where('is_active', true)->get();

        return view('pricing', compact('packages'));
    }
}
