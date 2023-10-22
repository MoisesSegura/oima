<?php

namespace App\Filament\Resources\CountryResource\Pages;

use App\Filament\Resources\CountryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Traits\Translatable;

class ViewCountry extends ViewRecord
{
    protected static string $resource = CountryResource::class;

    // use translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
