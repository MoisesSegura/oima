<?php

namespace App\Filament\Resources\BannerCategoryResource\Pages;

use App\Filament\Resources\BannerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListBannerCategories extends ListRecords
{
    protected static string $resource = BannerCategoryResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
