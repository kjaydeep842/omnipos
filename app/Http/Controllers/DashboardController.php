<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class DashboardController extends Controller
{
    public function index()
    {
        $topVendors = Vendor::orderBy('total_revenue', 'desc')->take(3)->get();
        return view('pages.dashboard', compact('topVendors'));
    }
}
