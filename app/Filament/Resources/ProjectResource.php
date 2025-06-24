<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;


class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('title')->required(),
        TextInput::make('category')->required(),
        Textarea::make('short_description')->rows(2),
        Textarea::make('full_description')->rows(6),
        TagsInput::make('technologies')->placeholder('Contoh: react, tailwind, framer'),
        FileUpload::make('thumbnail')
            ->directory('projects')
            ->image()
            ->visibility('public')
            ->label('Thumbnail'),
        TextInput::make('code_url')->label('Link ke Code'),
        TextInput::make('live_demo_url')->label('Link Demo'),
        Toggle::make('is_featured')->label('Tandai Featured'),
    ]);
}

public static function table(Table $table): Table
{
    return $table->columns([
        ImageColumn::make('thumbnail')->label('Thumb')->width(80),
        TextColumn::make('title')->searchable()->sortable(),
        TextColumn::make('category'),
        IconColumn::make('is_featured')
            ->boolean()
            ->label('Featured'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
