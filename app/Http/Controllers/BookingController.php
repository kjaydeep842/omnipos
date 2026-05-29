<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('room_number')->get();
        return view('pages.booking', compact('bookings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_number' => 'required|string|max:255',
            'status' => 'required|string',
            'customer_name' => 'nullable|string|max:255',
        ]);
        Booking::create($data);
        return redirect()->route('booking')->with('success', 'Booking created successfully');
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'room_number' => 'required|string|max:255',
            'status' => 'required|string',
            'customer_name' => 'nullable|string|max:255',
        ]);
        $booking->update($data);
        return redirect()->route('booking')->with('success', 'Booking updated successfully');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking')->with('success', 'Booking deleted successfully');
    }
}
