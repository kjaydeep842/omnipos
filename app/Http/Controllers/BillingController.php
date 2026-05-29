<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Vendor;
use Illuminate\Support\Str;

class BillingController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('vendor')->latest()->take(10)->get();
        $vendors = Vendor::all();
        return view('pages.billing', compact('invoices', 'vendors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'date' => 'required|date',
        ]);
        $data['invoice_number'] = 'INV-' . strtoupper(Str::random(6));
        Invoice::create($data);
        return redirect()->route('billing')->with('success', 'Invoice generated successfully');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('billing')->with('success', 'Invoice deleted successfully');
    }
}
