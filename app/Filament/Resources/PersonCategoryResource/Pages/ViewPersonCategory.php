<?php

namespace App\Filament\Resources\PersonCategoryResource\Pages;

use App\Filament\Resources\PersonCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewPersonCategory extends ViewRecord
{
    protected static string $resource = PersonCategoryResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
