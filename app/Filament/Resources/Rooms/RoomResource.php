<?php

namespace App\Filament\Resources\Rooms;

use App\Models\Room;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use App\Filament\Resources\Rooms\Pages\CreateRoom;
use App\Filament\Resources\Rooms\Pages\EditRoom;
use App\Filament\Resources\Rooms\Pages\ListRooms;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationLabel = 'Kamar Hotel';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('room_number')
                    ->label('Nomor Kamar')
                    ->required(),

                Select::make('type')
                    ->label('Tipe Kamar')
                    ->options([
                        'Standard' => 'Standard',
                        'Deluxe'   => 'Deluxe',
                        'Suite'    => 'Suite',
                    ])
                    ->required(),

                TextInput::make('price')
                    ->label('Harga per Malam')
                    ->numeric()
                    ->required(),

                Toggle::make('is_available')
                    ->label('Tersedia')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\Rooms\Tables\RoomsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListRooms::route('/'),
            'create' => CreateRoom::route('/create'),
            'edit'   => EditRoom::route('/{record}/edit'),
        ];
    }
}