<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('home', compact('rooms'));
    }

    public function search(Request $request)
    {
        $rooms = Room::query();

        if ($request->check_in && $request->check_out) {
            $rooms = $rooms->whereDoesntHave('bookings', function($query) use ($request) {
                $query->where('booking_status', '!=', 'cancelled')
                      ->where('check_in', '<', $request->check_out)
                      ->where('check_out', '>', $request->check_in);
            });
        }

        if ($request->type) {
            $rooms = $rooms->where('type', $request->type);
        }

        $rooms = $rooms->where('is_available', true)->get();

        return view('home', compact('rooms', 'request'));
    }
}