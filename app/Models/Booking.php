<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'room_id', 'check_in', 'check_out', 
        'total_price', 'booking_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function services()
    {
        return $this->belongsToMany(HotelService::class, 'booking_services', 'booking_id', 'service_id');
    }
}