<?php

namespace App\Filament\Resources\PersonCategoryResource\Pages;

use App\Filament\Resources\PersonCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListPersonCategories extends ListRecords
{
    protected static string $resource = PersonCategoryResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
