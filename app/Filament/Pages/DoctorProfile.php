<?php

namespace App\Filament\Pages;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Doctor;
use Filament\Pages\Page;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Grid;

class DoctorProfile extends Page implements HasForms
{
    use InteractsWithForms;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $title = 'My Profile';
    protected static ?string $navigationLabel = 'My Profile';
    protected string $view = 'filament.pages.doctor-profile';

    public array $data=[];
    public $user;

    public function mount(): void
    {
        $this->user = auth()->user();
        // Load the doctor's profile data here
        // $this->data = [
        //     'name' => 'Dr. John Doe',
        //     'department' => 'Cardiology',
        //     'designation' => 'Senior Consultant',
        //     'license_number' => 'LIC123456',
        //     'specialization' => 'Heart Diseases',
        //     'phone' => '+1234567890',
        //     'address' => '123 Medical St, Health City',
        // ];
        $doctor = $this->user->doctor ?? Doctor::create([
            'user_id' => $this->user->id,
        ]);
        $this->form->fill(['data'=>$doctor->toArray()]);

    }
    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('data.photo')
                ->directory('doctor-profile')
                ->label('Profile Photo')
                ->image()
                ->avatar()
                ->imageEditor()
                ->disk('public')
                ->circleCropper()
                ->downloadable(true),
            Grid::make(3)->schema([
                Select::make('data.department_id')
                ->label('Department')
                ->options(function () {
                    return Department::all()->pluck('department_name', 'id')->toArray();
                }),

                Select::make('data.designation_id')
                    ->label('Designation')
                    ->options(Designation::all()->pluck('designation_name','id'))
                    ->searchable()
                    ->preload(),
                TextInput::make('data.license_number')
                    ->required()
            ]),
            RichEditor::make('data.specialization'),
            Grid::make(2)->schema([
                TextInput::make('data.phone'),
                TextInput::make('data.address'),
            ])
        ];
    }

    public function save(): void
    {
        
        $doctor = $this->user->doctor;

        $doctor->update($this->form->getState()['data']);

        Notification::make()
            ->title('Profile updated successfully!')
            ->success()
            ->send();
    }
}
