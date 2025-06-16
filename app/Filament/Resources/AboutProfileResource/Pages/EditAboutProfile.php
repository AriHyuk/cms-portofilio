<?php

namespace App\Filament\Resources\AboutProfileResource\Pages;

use App\Filament\Resources\AboutProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutProfile extends EditRecord
{
    protected static string $resource = AboutProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
