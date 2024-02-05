<?php

namespace App\Filament\Resources\ProductGraphicResource\Pages;

use App\Filament\Resources\ProductGraphicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductGraphic extends EditRecord
{
    protected static string $resource = ProductGraphicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
