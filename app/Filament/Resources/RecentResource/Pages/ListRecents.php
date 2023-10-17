<?php

namespace App\Filament\Resources\RecentResource\Pages;

use App\Filament\Resources\RecentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Traits\Translatable;

class ListRecents extends ListRecords
{
    protected static string $resource = RecentResource::class;

    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
