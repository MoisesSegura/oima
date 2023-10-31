<?php

namespace App\Filament\Resources\AssistanceTypeResource\Pages;

use App\Filament\Resources\AssistanceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewAssistanceType extends ViewRecord
{
    protected static string $resource = AssistanceTypeResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
