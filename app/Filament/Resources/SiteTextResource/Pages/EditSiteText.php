<?php

namespace App\Filament\Resources\SiteTextResource\Pages;

use App\Filament\Resources\SiteTextResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditSiteText extends EditRecord
{
    protected static string $resource = SiteTextResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
