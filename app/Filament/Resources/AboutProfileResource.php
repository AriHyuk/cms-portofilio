<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutProfileResource\Pages;
use App\Filament\Resources\AboutProfileResource\RelationManagers;
use App\Models\AboutProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutProfileResource extends Resource
{
    protected static ?string $model = AboutProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'About';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAboutProfiles::route('/'),
            'create' => Pages\CreateAboutProfile::route('/create'),
            'edit' => Pages\EditAboutProfile::route('/{record}/edit'),
        ];
    }
}
