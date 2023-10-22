<?php

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditPerson extends EditRecord
{
    protected static string $resource = PersonResource::class;
    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
