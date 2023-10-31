<?php

namespace App\Filament\Resources\SiteTextResource\Pages;

use App\Filament\Resources\SiteTextResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Traits\Translatable;

class ViewSiteText extends ViewRecord
{
    protected static string $resource = SiteTextResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
