<?php

namespace App\Filament\Resources\OimaNewResource\Pages;

use App\Filament\Resources\OimaNewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListOimaNews extends ListRecords
{
    protected static string $resource = OimaNewResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
