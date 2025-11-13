<?php

namespace App\Filament\Resources\Appointments\Tables;

use App\Models\Patient;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;

class AppointmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('doctor.user.name')
                    ->label('Doctor')
                    ->searchable(),
                TextColumn::make('appointment_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('schedule.day')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('confirm')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->schema(function ($record) {
                        // Pre-fill from appointment
                        return [
                            Radio::make('patient_type')
                                ->label('Patient Type')
                                ->options([
                                    'new' => 'New Patient',
                                    'existing' => 'Existing Patient',
                                ])
                                ->default('new')
                                ->reactive(),

                            TextInput::make('patient_code')
                                ->label('Patient Code')
                                ->visible(fn (callable $get) => $get('patient_type') === 'existing')
                                ->required(fn (callable $get) => $get('patient_type') === 'existing'),

                            TextInput::make('name')
                                ->label('Patient Name')
                                ->default($record->name ?? null) // pre-fill from appointment
                                ->visible(fn (callable $get) => $get('patient_type') === 'new')
                                ->required(fn (callable $get) => $get('patient_type') === 'new'),

                            TextInput::make('phone')
                                ->label('Phone')
                                ->default($record->phone ?? null)
                                ->visible(fn (callable $get) => $get('patient_type') === 'new'),

                            DatePicker::make('dob')
                                ->label('Date of Birth')
                                ->default($record->dob ?? null)
                                ->visible(fn (callable $get) => $get('patient_type') === 'new'),
                            TextInput::make('age')
                                ->default($record->age ?? null)
                                ->visible(fn (callable $get) => $get('patient_type') === 'new'),
                            Select::make('gender')
                                ->options([
                                    'Male' => 'Male',
                                    'Female' => 'Female',
                                    'Other' => 'Other',
                                ])
                                ->default($record->gender ?? null)
                                ->visible(fn (callable $get) => $get('patient_type') === 'new'),
                        ];
                    })
                    ->action(function($record,$data){
                        if($data['patient_type']==='existing'){
                            $patient=Patient::where('patient_code',$data['patient_code'])->first();
                                if (! $patient) {
                                Notification::make()
                                    ->title('Invalid patient code!')
                                    ->danger()
                                    ->send();
                                return;
                            }
                            $record->update([
                                'patient_code'=>$data['patient_code'],
                                'patient_id'=>$patient->id,
                                'status'=>'confirmed',
                            ]);
                        }else{
                            $code = 'PT-' . str_pad(Patient::max('id') + 1, 5, '0', STR_PAD_LEFT);
                            $patient = Patient::create([
                                'patient_code' => $code,
                                'patient_name' => $record->name,
                                'patient_phone' =>  $record->phone,
                                'dob' => $record->dob,
                                'gender' => $record->gender,
                                'age' => $data['age'],
                                'attendant_name' => $record->attendant_name,
                                'attendant_phone' => $record->attendant_phone,
                                'patient_address' => $record->address,
                            ]);
                             $record->update([
                                'patient_id' => $patient->id,
                                'patient_code' => $code,
                                'status' => 'checked_in',
                            ]);

                            Notification::make()
                                ->title('Appointment confirmed successfully!')
                                ->success()
                                ->send();
                            }
                        }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
