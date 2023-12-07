<?php

namespace App\Filament\Resources\CarouselOimaResource\Pages;

use App\Filament\Resources\CarouselOimaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarouselOima extends EditRecord
{
    protected static string $resource = CarouselOimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
