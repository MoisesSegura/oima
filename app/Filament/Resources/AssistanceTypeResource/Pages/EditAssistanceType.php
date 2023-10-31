<?php

namespace App\Filament\Resources\AssistanceTypeResource\Pages;

use App\Filament\Resources\AssistanceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditAssistanceType extends EditRecord
{
    protected static string $resource = AssistanceTypeResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
