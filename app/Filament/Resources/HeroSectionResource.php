<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Filament\Resources\HeroSectionResource\RelationManagers;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('title')->required(),
            TextInput::make('subtitle')->required(),
            Textarea::make('description')->rows(4),
            TextInput::make('cta_label')->label('Button Label'),
            TextInput::make('cta_url')->label('Button URL'),
            FileUpload::make('image_path')
                ->label('Hero Image')
                ->image()
                ->directory('hero')
                ->visibility('public'),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('image_path')
                ->label('Hero Image')
                ->disk('public')
                ->height(50)
                ->width(50)
                ->circular(), // opsional: bikin foto jadi bulat

            Tables\Columns\TextColumn::make('title')
                ->label('Judul')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('subtitle')
                ->label('Sub Judul')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('cta_label')
                ->label('Tombol')
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d M Y, H:i')
                ->sortable(),
        ])
        ->filters([
            // Kosongkan atau tambah jika perlu filter
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
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}
