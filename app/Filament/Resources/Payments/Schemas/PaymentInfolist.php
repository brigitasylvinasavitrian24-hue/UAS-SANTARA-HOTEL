<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('booking_id')
                    ->numeric(),
                TextEntry::make('payment_method'),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('payment_status'),
                TextEntry::make('transaction_reference'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
