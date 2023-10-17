<?php

namespace App\Filament\Resources\LaboralDocumentResource\Pages;

use App\Filament\Resources\LaboralDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditLaboralDocument extends EditRecord
{
    protected static string $resource = LaboralDocumentResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
