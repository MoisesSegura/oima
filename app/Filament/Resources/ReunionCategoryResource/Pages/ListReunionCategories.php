<?php

namespace App\Filament\Resources\ReunionCategoryResource\Pages;

use App\Filament\Resources\ReunionCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListReunionCategories extends ListRecords
{
    protected static string $resource = ReunionCategoryResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
