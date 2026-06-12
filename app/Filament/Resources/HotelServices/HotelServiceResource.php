<?php

namespace App\Filament\Resources\HotelServices;

use App\Filament\Resources\HotelServices\Pages\CreateHotelService;
use App\Filament\Resources\HotelServices\Pages\EditHotelService;
use App\Filament\Resources\HotelServices\Pages\ListHotelServices;
use App\Filament\Resources\HotelServices\Pages\ViewHotelService;
use App\Filament\Resources\HotelServices\Schemas\HotelServiceForm;
use App\Filament\Resources\HotelServices\Schemas\HotelServiceInfolist;
use App\Filament\Resources\HotelServices\Tables\HotelServicesTable;
use App\Models\HotelService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HotelServiceResource extends Resource
{
    protected static ?string $model = HotelService::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return HotelServiceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HotelServiceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HotelServicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHotelServices::route('/'),
            'create' => CreateHotelService::route('/create'),
            'view' => ViewHotelService::route('/{record}'),
            'edit' => EditHotelService::route('/{record}/edit'),
        ];
    }
}
