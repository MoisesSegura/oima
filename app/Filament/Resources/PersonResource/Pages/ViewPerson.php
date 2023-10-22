<?php

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewPerson extends ViewRecord
{
    protected static string $resource = PersonResource::class;
    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
