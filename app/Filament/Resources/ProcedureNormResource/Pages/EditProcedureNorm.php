<?php

namespace App\Filament\Resources\ProcedureNormResource\Pages;

use App\Filament\Resources\ProcedureNormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditProcedureNorm extends EditRecord
{
    protected static string $resource = ProcedureNormResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
