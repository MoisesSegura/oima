<?php

namespace App\Filament\Resources\FosUserResource\Pages;

use App\Filament\Resources\FosUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFosUser extends EditRecord
{
    protected static string $resource = FosUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
