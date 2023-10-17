<?php

namespace App\Filament\Resources\BannerCategoryResource\Pages;

use App\Filament\Resources\BannerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewBannerCategory extends ViewRecord
{
    protected static string $resource = BannerCategoryResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
