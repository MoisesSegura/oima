<?php

namespace App\Filament\Resources\FosUserResource\Pages;

use App\Filament\Resources\FosUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFosUsers extends ListRecords
{
    protected static string $resource = FosUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
