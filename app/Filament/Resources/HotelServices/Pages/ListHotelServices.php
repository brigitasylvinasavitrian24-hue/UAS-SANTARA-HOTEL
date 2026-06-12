<?php

namespace App\Filament\Resources\HotelServices\Pages;

use App\Filament\Resources\HotelServices\HotelServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHotelServices extends ListRecords
{
    protected static string $resource = HotelServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
