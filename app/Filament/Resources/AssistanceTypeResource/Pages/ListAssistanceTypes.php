<?php

namespace App\Filament\Resources\AssistanceTypeResource\Pages;

use App\Filament\Resources\AssistanceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListAssistanceTypes extends ListRecords
{
    protected static string $resource = AssistanceTypeResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
