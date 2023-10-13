<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    use translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
