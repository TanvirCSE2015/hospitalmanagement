<?php

namespace App\Filament\Resources\Tests\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('test_name')
                    ->required(),
                TextInput::make('standard_value')
                    ->default(null),
                Select::make('unit_id')
                    ->relationship('unit', 'unit_name')
                    ->label('Unit')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('unit_name')
                            ->required(),
                    ]),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
