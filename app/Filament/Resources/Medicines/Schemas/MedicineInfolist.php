<?php

namespace App\Filament\Resources\Medicines\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MedicineInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('generic_name')
                    ->placeholder('-'),
                TextEntry::make('type_id')
                    ->numeric(),
                TextEntry::make('unit_id')
                    ->numeric(),
                TextEntry::make('strength')
                    ->placeholder('-'),
                TextEntry::make('manufacturer')
                    ->placeholder('-'),
                TextEntry::make('note')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
