<?php

namespace App\Filament\Resources\RegionResource\Pages;

use App\Filament\Resources\RegionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\Translatable;

class ListRegions extends ListRecords
{
    protected static string $resource = RegionResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
