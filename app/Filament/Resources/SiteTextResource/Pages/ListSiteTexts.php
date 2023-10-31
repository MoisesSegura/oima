<?php

namespace App\Filament\Resources\SiteTextResource\Pages;

use App\Filament\Resources\SiteTextResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListSiteTexts extends ListRecords
{
    protected static string $resource = SiteTextResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
