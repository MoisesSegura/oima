<?php

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListPeople extends ListRecords
{
    protected static string $resource = PersonResource::class;
    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
