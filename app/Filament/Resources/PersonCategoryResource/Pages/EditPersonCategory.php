<?php

namespace App\Filament\Resources\PersonCategoryResource\Pages;

use App\Filament\Resources\PersonCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditPersonCategory extends EditRecord
{
    protected static string $resource = PersonCategoryResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
