<?php

namespace App\Filament\Resources\AdditionalToolResource\Pages;

use App\Filament\Resources\AdditionalToolResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAdditionalTool extends ViewRecord
{
    protected static string $resource = AdditionalToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
