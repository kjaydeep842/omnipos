<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('pages.vendors', compact('vendors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'status' => 'required|string',
            'commission' => 'required|string',
        ]);
        $data['initials'] = strtoupper(substr($data['name'], 0, 2));
        Vendor::create($data);
        return redirect()->route('vendors')->with('success', 'Vendor added successfully');
    }

    public function update(Request $request, Vendor $vendor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'status' => 'required|string',
            'commission' => 'required|string',
        ]);
        $data['initials'] = strtoupper(substr($data['name'], 0, 2));
        $vendor->update($data);
        return redirect()->route('vendors')->with('success', 'Vendor updated successfully');
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('vendors')->with('success', 'Vendor deleted successfully');
    }
}
