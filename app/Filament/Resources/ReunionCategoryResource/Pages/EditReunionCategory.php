<?php

namespace App\Filament\Resources\ReunionCategoryResource\Pages;

use App\Filament\Resources\ReunionCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditReunionCategory extends EditRecord
{
    protected static string $resource = ReunionCategoryResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
