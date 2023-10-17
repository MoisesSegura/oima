<?php

namespace App\Filament\Resources\BannerCategoryResource\Pages;

use App\Filament\Resources\BannerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditBannerCategory extends EditRecord
{
    protected static string $resource = BannerCategoryResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
