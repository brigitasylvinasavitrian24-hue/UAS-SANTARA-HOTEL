<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('booking.form', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id'   => 'required|exists:rooms,id',
            'check_in'  => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $room = Room::findOrFail($request->room_id);
        $days = \Carbon\Carbon::parse($request->check_in)
                    ->diffInDays($request->check_out);
        $total = $room->price * $days;

        $booking = Booking::create([
            'user_id'        => Auth::id(),
            'room_id'        => $request->room_id,
            'check_in'       => $request->check_in,
            'check_out'      => $request->check_out,
            'total_price'    => $total,
            'booking_status' => 'pending',
        ]);

        return redirect()->route('booking.confirmation', $booking->id);
    }

    public function confirmation($id)
    {
        $booking = Booking::with(['room', 'payment'])->findOrFail($id);
        return view('booking.confirmation', compact('booking'));
    }

    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())
                        ->with('room')
                        ->latest()
                        ->get();
        return view('booking.my-bookings', compact('bookings'));
    }

    public function cancel($id)
    {
        $booking = Booking::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();
        $booking->update(['booking_status' => 'cancelled']);

        return redirect()->route('my.bookings')
                        ->with('success', 'Booking berhasil dibatalkan.');
    }
}