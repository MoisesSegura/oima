<?php

namespace App\Filament\Resources\AdditionalToolResource\Pages;

use App\Filament\Resources\AdditionalToolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdditionalTools extends ListRecords
{
    protected static string $resource = AdditionalToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
