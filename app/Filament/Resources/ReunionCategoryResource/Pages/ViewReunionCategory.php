<?php

namespace App\Filament\Resources\ReunionCategoryResource\Pages;

use App\Filament\Resources\ReunionCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewReunionCategory extends ViewRecord
{
    protected static string $resource = ReunionCategoryResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
