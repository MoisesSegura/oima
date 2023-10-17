<?php

namespace App\Filament\Resources\RecentResource\Pages;

use App\Filament\Resources\RecentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Filament\Traits\Translatable;

class ViewRecent extends ViewRecord
{
    protected static string $resource = RecentResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
