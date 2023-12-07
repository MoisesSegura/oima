<?php

namespace App\Filament\Resources\CarouselOimaResource\Pages;

use App\Filament\Resources\CarouselOimaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarouselOimas extends ListRecords
{
    protected static string $resource = CarouselOimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
