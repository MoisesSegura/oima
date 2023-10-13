<?php

namespace App\Filament\Resources\RegionResource\Pages;

use App\Filament\Resources\RegionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Traits\Translatable;

class ViewRegion extends ViewRecord
{
    protected static string $resource = RegionResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
