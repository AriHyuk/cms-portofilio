<?php

namespace App\Filament\Resources\AboutProfileResource\Pages;

use App\Filament\Resources\AboutProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutProfiles extends ListRecords
{
    protected static string $resource = AboutProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
