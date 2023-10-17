<?php

namespace App\Filament\Resources\ProcedureNormResource\Pages;

use App\Filament\Resources\ProcedureNormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListProcedureNorms extends ListRecords
{
    protected static string $resource = ProcedureNormResource::class;
    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
