<?php

namespace App\Filament\Resources\LaboralDocumentResource\Pages;

use App\Filament\Resources\LaboralDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewLaboralDocument extends ViewRecord
{
    protected static string $resource = LaboralDocumentResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
