<?php

namespace App\Filament\Resources\HotelServices\Pages;

use App\Filament\Resources\HotelServices\HotelServiceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHotelService extends ViewRecord
{
    protected static string $resource = HotelServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
