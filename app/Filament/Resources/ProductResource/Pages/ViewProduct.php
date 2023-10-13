<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;

    use translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
