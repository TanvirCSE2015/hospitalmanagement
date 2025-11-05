<?php

namespace App\Filament\Resources\Medicines\Schemas;

use App\Models\Type;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class MedicineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)->schema([
                    TextInput::make('name')
                        ->label('Medicine Name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('generic_name')
                        ->label('Generic Name')
                        ->maxLength(255),
                ]),

                Grid::make(2)->schema([
                    // TYPE SELECTION
                    Select::make('type_id')
                        ->label('Medicine Type')
                        ->relationship('type', 'type_name')
                        ->reactive()
                        ->afterStateUpdated(fn (callable $set) => $set('unit_id', null))
                        ->required(),

                    // DYNAMIC UNIT DROPDOWN
                    Select::make('unit_id')
                        ->label('Unit')
                        ->options(function (Get $get) {
                            $typeId = $get('type_id');
                            if (!$typeId) return [];

                            $type = Type::with('units')->find($typeId);
                            return $type?->units?->pluck('unit_name', 'id') ?? [];
                        })
                        ->disabled(fn (Get $get) => blank($get('type_id')))
                        ->required()
                        ->searchable()
                        ->preload()
                        ->helperText('Select a type first to see available units.'),
                ]),

                Grid::make(2)->schema([
                    TextInput::make('strength')
                        ->label('Strength (e.g. 500 mg)')
                        ->maxLength(255),

                    TextInput::make('manufacturer')
                        ->label('Manufacturer')
                        ->maxLength(255),
                ]),

                Textarea::make('note')
                    ->label('Note / Description')
                    ->columnSpanFull(),
            ]);
    }
}
