<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('room_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('check_in')
                    ->required(),
                DatePicker::make('check_out')
                    ->required(),
                TextInput::make('total_price')
                    ->required()
                    ->numeric(),
                Select::make('booking_status')
                    ->options([
            'pending' => 'Pending',
            'confirmed' => 'Confirmed',
            'cancelled' => 'Cancelled',
            'completed' => 'Completed',
        ])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
