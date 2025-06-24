<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('name')->required()->label('Full Name'),
        TextInput::make('email')->required()->email(),
        Select::make('category')
            ->options([
                'Web Development' => 'Web Development',
                'UI/UX Design' => 'UI/UX Design',
                'Mobile App' => 'Mobile App',
                'Consultation' => 'Consultation',
            ])
            ->searchable()
            ->label('Service Category'),
        TextInput::make('budget')->numeric()->prefix('$')->label('Budget (USD)'),
        Textarea::make('details')->rows(4)->label('Project Details'),
        Select::make('status')
            ->options([
                'pending' => 'Pending',
                'accepted' => 'Accepted',
                'declined' => 'Declined',
                'done' => 'Done',
            ])
            ->default('pending')
            ->label('Status'),
    ]);
}



public static function table(Table $table): Table
{
    return $table->columns([
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('email'),
        TextColumn::make('category'),
        TextColumn::make('budget')->money('usd'),
        BadgeColumn::make('status')
            ->colors([
                'warning' => 'pending',
                'success' => 'accepted',
                'danger' => 'declined',
                'secondary' => 'done',
            ]),
        TextColumn::make('created_at')->dateTime('d M Y, H:i')->sortable()->label('Submitted'),
    ])
    ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
    ])
    ->bulkActions([
        Tables\Actions\DeleteBulkAction::make(),
    ]);
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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
