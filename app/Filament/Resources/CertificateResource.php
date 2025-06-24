<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Filament\Resources\CertificateResource\RelationManagers;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('name')->required()->label('Certificate Name'),
        TextInput::make('issuer')->label('Issuer'),
        DatePicker::make('issued_at')->label('Issued At'),
        FileUpload::make('image')
            ->directory('certificates')
            ->image()
            ->visibility('public')
            ->label('Image'),
        TextInput::make('certificate_url')->label('Certificate URL'),
    ]);
}




public static function table(Table $table): Table
{
    return $table->columns([
        ImageColumn::make('image')->disk('public')->label('Image')->width(90),
        TextColumn::make('name')->sortable()->searchable(),
        TextColumn::make('issuer')->sortable(),
        TextColumn::make('issued_at')->date()->label('Issued At')->sortable(),
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
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
