<?php

namespace App\Filament\Resources\ProductGraphicResource\Pages;

use App\Filament\Resources\ProductGraphicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductGraphics extends ListRecords
{
    protected static string $resource = ProductGraphicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
