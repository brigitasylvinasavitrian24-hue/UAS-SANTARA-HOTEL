<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BookingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('room_id')
                    ->numeric(),
                TextEntry::make('check_in')
                    ->date(),
                TextEntry::make('check_out')
                    ->date(),
                TextEntry::make('total_price')
                    ->numeric(),
                TextEntry::make('booking_status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
