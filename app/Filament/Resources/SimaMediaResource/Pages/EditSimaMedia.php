<?php

namespace App\Filament\Resources\SimaMediaResource\Pages;

use App\Filament\Resources\SimaMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditSimaMedia extends EditRecord
{
    protected static string $resource = SimaMediaResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
