<?php

namespace App\Filament\Resources\Types\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type_name')
                    ->required(),
                Select::make('units')
                ->label('Assign Units')
                ->multiple()
                ->relationship('units', 'unit_name')
                ->preload()
                ->searchable()
                ->helperText('Select the units applicable for this medicine type.'),
            ]);
    }
}
