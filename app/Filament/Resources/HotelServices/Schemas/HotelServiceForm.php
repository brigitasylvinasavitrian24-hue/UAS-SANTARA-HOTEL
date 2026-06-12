<?php

namespace App\Filament\Resources\HotelServices\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HotelServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }
}
