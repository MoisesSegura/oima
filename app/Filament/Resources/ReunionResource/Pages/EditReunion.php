<?php

namespace App\Filament\Resources\ReunionResource\Pages;

use App\Filament\Resources\ReunionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Traits\Translatable;

class EditReunion extends EditRecord
{
    protected static string $resource = ReunionResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
