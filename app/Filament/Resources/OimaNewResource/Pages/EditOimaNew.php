<?php

namespace App\Filament\Resources\OimaNewResource\Pages;

use App\Filament\Resources\OimaNewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditOimaNew extends EditRecord
{
    protected static string $resource = OimaNewResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
