<?php

namespace App\Filament\Resources\SimaMediaResource\Pages;

use App\Filament\Resources\SimaMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListSimaMedia extends ListRecords
{
    protected static string $resource = SimaMediaResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
