<?php

namespace App\Filament\Resources\ProcedureNormResource\Pages;

use App\Filament\Resources\ProcedureNormResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewProcedureNorm extends ViewRecord
{
    protected static string $resource = ProcedureNormResource::class;
    use translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
