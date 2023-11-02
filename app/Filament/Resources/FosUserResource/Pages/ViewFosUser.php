<?php

namespace App\Filament\Resources\FosUserResource\Pages;

use App\Filament\Resources\FosUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFosUser extends ViewRecord
{
    protected static string $resource = FosUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
