<?php

namespace App\Filament\Resources\SimaMediaResource\Pages;

use App\Filament\Resources\SimaMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewSimaMedia extends ViewRecord
{
    protected static string $resource = SimaMediaResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
