<?php

namespace App\Filament\Resources\AdditionalToolResource\Pages;

use App\Filament\Resources\AdditionalToolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdditionalTool extends EditRecord
{
    protected static string $resource = AdditionalToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
