<?php

namespace App\Filament\Resources\LaboralDocumentResource\Pages;

use App\Filament\Resources\LaboralDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListLaboralDocuments extends ListRecords
{
    protected static string $resource = LaboralDocumentResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
