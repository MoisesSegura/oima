<?php

namespace App\Filament\Resources\CountryResource\Pages;

use App\Filament\Resources\CountryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\Tabs;
use App\Filament\Traits\Translatable;

class ListCountries extends ListRecords
{
    protected static string $resource = CountryResource::class;

    use translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

  
}
