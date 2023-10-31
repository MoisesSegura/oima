<?php

namespace App\Filament\Resources\OimaNewResource\Pages;

use App\Filament\Resources\OimaNewResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewOimaNew extends ViewRecord
{
    protected static string $resource = OimaNewResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
