<?php

namespace App\Filament\Resources\ReunionResource\Pages;

use App\Filament\Resources\ReunionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewReunion extends ViewRecord
{
    protected static string $resource = ReunionResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
