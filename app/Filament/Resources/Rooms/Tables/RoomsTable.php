<?php

namespace App\Filament\Resources\Rooms\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;

class RoomsTable
{
    public static function configure($table)
    {
        return $table
            ->columns([
                TextColumn::make('room_number')
                    ->label('Nomor Kamar')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Tipe Kamar')
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Harga')
                    ->formatStateUsing(
                        fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')
                    )
                    ->sortable(),
                IconColumn::make('is_available')
                    ->label('Status')
                    ->boolean(),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}