<?php

namespace App\Filament\Resources\RegionResource\Pages;

use App\Filament\Resources\RegionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Traits\Translatable;

class EditRegion extends EditRecord
{
    protected static string $resource = RegionResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
