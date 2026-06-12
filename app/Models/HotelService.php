<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelService extends Model
{
    protected $fillable = [
        'name', 'price'
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_services', 'service_id', 'booking_id');
    }
}