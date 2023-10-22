<?php

namespace App\Filament\Resources\ReunionResource\Pages;

use App\Filament\Resources\ReunionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListReunions extends ListRecords
{
    protected static string $resource = ReunionResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
