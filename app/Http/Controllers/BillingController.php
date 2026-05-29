<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Vendor;

class BillingController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('vendor')->latest()->take(10)->get();
        $vendors = Vendor::all();
        return view('pages.billing', compact('invoices', 'vendors'));
    }
}
