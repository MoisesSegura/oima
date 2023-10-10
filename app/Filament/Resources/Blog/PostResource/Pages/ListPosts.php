<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Resources\Blog\PostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

use App\Filament\Traits\Translatable;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    use Translatable;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

 

    

}
