<?php

namespace App\Filament\Resources\RecentResource\Pages;

use App\Filament\Resources\RecentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Filament\Traits\Translatable;

class EditRecent extends EditRecord
{
    protected static string $resource = RecentResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
